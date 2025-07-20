<?php
namespace App\Models;
use App\Models\Driver;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DriverLocation extends Model
{
    use HasFactory,UsesUuid;
    protected $table = 'driver_locations';
    protected $fillable = ['driver_id', 'latitude', 'longitude', 'last_updated_at'];
    protected $casts = [
        'id' => 'string',
        'driver_id' => 'string',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'last_updated_at' => 'datetime'
    ];
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
