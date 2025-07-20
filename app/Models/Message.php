<?php
namespace App\Models;
use App\Models\Chat;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'messages';
    protected $fillable = ['chat_id', 'sender_type', 'sender_id', 'message'];
    protected $casts = [
        'id' => 'string',
        'chat_id' => 'string',
        'sender_type' => 'string',
        'sender_id' => 'integer',
        'message' => 'string',
    ];
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
    public function sender()
    {
        return $this->morphTo();
    }
}
