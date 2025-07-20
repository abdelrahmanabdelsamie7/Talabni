<?php
namespace App\Models;
use App\Models\{Address, Order, Rating, Review, SupportTicket, Message};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'password'];
    protected $casts = [
        'id' => 'string'
    ];
    protected $hidden = ['password', 'remember_token'];
    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'customer_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_id');
    }
    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class, 'customer_id');
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }
}
