<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uid',
        'name',
        'team_id',
        'sector_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'device_type_id',
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function device_type()
    {
        return $this->belongsTo(DeviceType::class, 'device_type_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
