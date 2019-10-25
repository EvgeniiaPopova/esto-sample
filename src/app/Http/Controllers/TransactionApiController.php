<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaction $request)
    {
        return Transaction::create($request->all());
    }
    
}
