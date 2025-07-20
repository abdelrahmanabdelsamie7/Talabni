<?php
namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Admin extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'admins';
    protected $fillable = ['name', 'email', 'password', 'is_super_admin'];
    protected $casts = [
        'id' => 'string',
        'is_super_admin' => 'boolean',
    ];
    protected $hidden = ['password', 'remember_token'];
}
