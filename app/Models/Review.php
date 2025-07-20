<?php
namespace App\Models;
use App\Models\{Store, Customer};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'reviews';
    protected $fillable = ['store_id', 'customer_id', 'rating', 'comment'];
    protected $casts = ['id' => 'string','store_id' => 'string','customer_id' => 'string','rating' => 'integer'];
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}