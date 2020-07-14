<?php

namespace App\Http\Controllers;

use App\Query;
use App\Result;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    // load the queries
    public function index() {
        return json_encode(Query::get());
    }

    // load the results based on a single query
    public function show(Query $query)
    {
        return json_encode([
            'query' => $query->input,
            'results' => $query->results()->paginate()
        ]);
    }

    // save data to the database
    public function store(Request $request)
    {
        // saving the query itself and then attaching the results
        $query = Query::create($request->input)->results()->createMany($request->results);

        return json_encode($query);
    }
}
