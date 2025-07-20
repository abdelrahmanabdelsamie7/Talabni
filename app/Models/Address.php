<?php
namespace App\Models;
use App\Models\{Customer, Order};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'addresses';
    protected $fillable = ['customer_id','title','full_address','latitude','longitude'];
    protected $casts = [
        'id' => 'string',
        'customer_id' => 'string',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id');
    }
}
