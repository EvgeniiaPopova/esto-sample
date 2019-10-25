<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Services\UserTransactions;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTransaction = new UserTransactions();
        $lastUsers = $userTransaction->lastUsers(10);
    
        $lastUsers->each(function ($value, $key) use ($userTransaction){
            $value->debitAmount = $userTransaction->userDebit($value);
        });
        
        return response()->json($lastUsers);
    
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return User
     */
    public function store(StoreUser $request)
    {
        return User::create($request->all());
    }
}
