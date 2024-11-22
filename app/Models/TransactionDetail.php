<?php

namespace App\Models;

use App\Traits\WithLog;
use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory, WithUuid, WithLog;

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
    ];
}
