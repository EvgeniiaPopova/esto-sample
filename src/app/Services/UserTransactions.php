<?php


namespace App\Services;

use App\User;

class UserTransactions
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
     * @param User $user
     * @return User
     */
    public function userDebit()
    {
        return $this->user->debitTransactions()->sum('amount');
    }
}
