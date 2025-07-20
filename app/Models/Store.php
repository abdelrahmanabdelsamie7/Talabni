<?php
namespace App\Models;
use App\Traits\UsesUuid;
use App\Models\{StoreOwner, Product, Order, Review};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'stores';
    protected $fillable = ['name', 'logo', 'store_owner_id', 'type', 'address', 'is_active', 'location_lat', 'location_lng'];
    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
    ];
    public function storeOwner()
    {
        return $this->belongsTo(StoreOwner::class, 'store_owner_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'store_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'store_id');
    }
}
