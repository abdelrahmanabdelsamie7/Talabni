<?php
namespace App\Models;
use App\Models\{Order, Product};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory,UsesUuid;
    protected $table = 'order_items';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];
    protected $casts = [
        'id' => 'string',
        'quantity' => 'integer',
        'price' => 'decimal:2'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}