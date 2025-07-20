<?php
namespace App\Models;
use App\Models\{Customer, Order};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'ratings';
    protected $fillable = ['order_id', 'customer_id', 'rating', 'comment'];
    protected $casts = [
        'id' => 'string',
        'order_id' => 'string',
        'customer_id' => 'string',
        'rating' => 'integer'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}