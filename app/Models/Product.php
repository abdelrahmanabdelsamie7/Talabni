<?php
namespace App\Models;
use App\Models\{Store, OrderItem};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'stock', 'store_id', 'image', 'is_available'];
    protected $casts = [
        'id' => 'string',
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_available' => 'boolean'
    ];
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}