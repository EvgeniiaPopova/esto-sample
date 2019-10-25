<?php


namespace App\Services;


use App\Transaction;
use App\User;

class UserTransactions
{
    /**
     * @param User $user
     * @return User
     */
    public function userDebit(User $user)
    {
        return $user->debitTransactions()->sum('amount');
    }
    
    /**
     * @param int $qty
     * @return User
     */
    public function lastUsers($qty = 100)
    {
        $users = User::orderBy('id', 'DESC')->limit($qty)->get();
    
        return $users;
    }
    
    
}
