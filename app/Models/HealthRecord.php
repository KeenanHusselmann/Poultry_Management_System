<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthRecord extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'health_records';

    protected $dates = [
        'record_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'live_stock_id',
        'disease_id',
        'record_date',
        'notes',
        'desc_of_sick',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function live_stock()
    {
        return $this->belongsTo(LifeStock::class, 'live_stock_id');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function getRecordDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRecordDateAttribute($value)
    {
        $this->attributes['record_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
