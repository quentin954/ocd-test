<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testDegree()
    {
        DB::enableQueryLog();
        $timestart = microtime(true);

        $person = Person::findOrFail(84);
        $degree = $person->getDegreeWith(1265);

        $timeend = microtime(true);
        $queries = DB::getQueryLog();

        return response()->json([
            'degree' => $degree,
            'execution_time' => $timeend - $timestart,
            'queries_count' => count($queries),
        ]);
    }
}
