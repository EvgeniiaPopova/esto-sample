<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaction;
use App\Transaction;

class TransactionApiController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTransaction $request
     * @return Transaction
     */
    public function store(StoreTransaction $request)
    {
        return Transaction::create($request->validated());
    }
    
}
