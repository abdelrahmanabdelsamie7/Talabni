<?php
namespace App\Models;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory, UsesUuid;
    protected $table = 'coupons';
    protected $fillable = ['code', 'type', 'value', 'max_usage', 'usage_count', 'expires_at'];
    protected $casts = [
        'id' => 'string',
        'value' => 'decimal:2',
        'max_usage' => 'integer',
        'usage_count' => 'integer',
        'expires_at' => 'datetime'
    ];
}
