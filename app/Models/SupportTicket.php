<?php
namespace App\Models;
use App\Models\{Customer, Driver, StoreOwner};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportTicket extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'support_tickets';
    protected $fillable = ['customer_id','driver_id','store_owner_id','subject','message','status'];
    protected $casts = [
        'id' => 'string',
        'customer_id' => 'string',
        'driver_id' => 'string',
        'store_owner_id' => 'string',
        'status' => 'string',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function storeOwner()
    {
        return $this->belongsTo(StoreOwner::class, 'store_owner_id');
    }
}
