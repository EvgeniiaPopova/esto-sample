<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Transaction
 *
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction query()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    /** @var string */
    protected $table = 'transactions';
    
    /** @var array */
    protected $guarded = [];
    
    /** @const int */
    const TYPE_CREDIT = 1;
    const TYPE_DEBIT = 2;
    
    /** @const array */
    const TRANSACTION_TYPES = [
        self::TYPE_CREDIT => 'credit',
        self::TYPE_DEBIT => 'debit',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /**
     * Scope a query to only include credit transactions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $type)
    {
        return $query->where('type', '=', $type);
    }
}
