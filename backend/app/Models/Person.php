<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    protected $fillable = [
        'created_by',
        'first_name',
        'last_name',
        'birth_name',
        'middle_names',
        'date_of_birth',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function children()
    {
        return $this->hasManyThrough(Person::class, Relationship::class, 'parent_id', 'id', 'id', 'child_id');
    }

    public function parents()
    {
        return $this->hasManyThrough(Person::class, Relationship::class, 'child_id', 'id', 'id', 'parent_id');
    }

    public function getDegreeWith($target_person_id)
    {
        $relations = DB::select(DB::raw("
            SELECT parent_id, child_id
            FROM relationships
        "));
    
        $relationships = [];
        foreach ($relations as $relation) {
            if (!isset($relationships[$relation->parent_id])) {
                $relationships[$relation->parent_id] = [];
            }
            if (!isset($relationships[$relation->child_id])) {
                $relationships[$relation->child_id] = [];
            }
            $relationships[$relation->parent_id][] = $relation->child_id;
            $relationships[$relation->child_id][] = $relation->parent_id;
        }
    
        $queue = new \SplQueue();
        $queue->enqueue([$this->id, 0, [$this->id]]);
    
        $visited = [];
    
        while (!$queue->isEmpty()) {
            list($current_id, $degree, $path) = $queue->dequeue();
    
            if ($current_id == $target_person_id) {
                return ['degree' => $degree, 'path' => $path];
            }
    
            if (isset($visited[$current_id])) {
                continue;
            }
    
            $visited[$current_id] = true;
    
            if ($degree > 25) {
                return false;
            }
    
            if (isset($relationships[$current_id])) {
                foreach ($relationships[$current_id] as $related_id) {
                    if (!isset($visited[$related_id])) {
                        $new_path = $path;
                        $new_path[] = $related_id;
                        $queue->enqueue([$related_id, $degree + 1, $new_path]);
                    }
                }
            }
        }
    
        return false;
    }
}