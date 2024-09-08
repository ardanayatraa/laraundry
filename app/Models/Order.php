<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'customer_id', 'laundry_owner_id', 'order_number', 'total_weight',
        'status', 'pickup_date', 'delivery_date', 'total_price', 'payment_status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function laundryOwner()
    {
        return $this->belongsTo(LaundryOwner::class);
    }

    public function items()
    {
        return $this->hasMany(LaundryItem::class);
    }
}
