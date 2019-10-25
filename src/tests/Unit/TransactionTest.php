<?php

namespace Tests\Unit;

use App\Transaction;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        for ($i = 0; $i < 10; $i++) {
            $user = \App\User::all()->random();
            $this->be($user);
            $transaction = factory(Transaction::class)->raw();
            $this->post(route('transaction.store'), $transaction)
                ->assertStatus(201)
                ->assertJson($transaction);
        }
    }
}
