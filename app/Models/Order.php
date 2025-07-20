<?php
namespace App\Models;
use App\Models\{Customer, Store, Address, Driver, OrderItem, Rating, Chat};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'orders';
    protected $fillable = ['customer_id', 'store_id', 'driver_id', 'total_price', 'total_items', 'status', 'total_amount', 'delivered_at'];
    protected $casts = [
        'id' => 'string',
        'customer_id' => 'string',
        'store_id' => 'string',
        'driver_id' => 'string',
        'status' => 'string',
        'total_price' => 'decimal:2',
        'total_items' => 'integer',
        'delivered_at' => 'datetime'
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'order_id');
    }
    public function chats()
    {
        return $this->hasMany(Chat::class, 'order_id');
    }
}
