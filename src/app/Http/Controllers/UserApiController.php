<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Services\UserTransactions;
use App\User;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastUsers = User::latestUsers(10);
        
        $lastUsers->each(function ($value, $key) {
            $userTransaction = new UserTransactions($value);
            $value->debitAmount = $userTransaction->userDebit();
        });
        
        return response()->json($lastUsers);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUser $request
     * @return User
     */
    public function store(StoreUser $request)
    {
        return User::create($request->validated());
    }
}
