<?php
namespace App\Models;
use App\Models\{Store, SupportTicket, Message};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreOwner extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'store_owners';
    protected $fillable = ['name', 'email', 'password', 'phone'];
    protected $casts = [
        'id' => 'string'
    ];
    protected $hidden = ['password', 'remember_token'];
    public function stores()
    {
        return $this->hasMany(Store::class, 'store_owner_id');
    }
    public function supportTickets()
    {
        return $this->hasMany(SupportTicket::class, 'store_owner_id');
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }
}
