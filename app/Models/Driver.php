<?php
namespace App\Models;
use App\Models\{Order, DriverLocation, SupportTicket, Message};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'drivers';
    protected $fillable = ['name', 'email', 'password', 'phone', 'vehicle_type', 'license_image', 'is_available'];
    protected $casts = [
        'id' => 'string',
        'is_available' => 'boolean',
    ];
    protected $hidden = ['password', 'remember_token'];
    public function orders()
    {
        return $this->hasMany(Order::class, 'driver_id');
    }
    public function locations()
    {
        return $this->hasMany(DriverLocation::class, 'driver_id');
    }
    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class, 'driver_id');
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }
}
