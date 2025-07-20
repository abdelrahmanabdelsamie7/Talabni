<?php
namespace App\Models;
use App\Models\{Order, Message};
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'chats';
    protected $fillable = ['order_id'];
    protected $casts = [
        'id' => 'string',
        'order_id' => 'string',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id');
    }
}
