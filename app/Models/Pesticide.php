<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesticide extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pesticides';

    protected $dates = [
        'purchase_date',
        'expiry_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'description',
        'purchase_date',
        'quantity',
        'manufacturer',
        'usage_instructions',
        'safety_instructions',
        'expiry_date',
        'life_stock_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getPurchaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPurchaseDateAttribute($value)
    {
        $this->attributes['purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpiryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function life_stock()
    {
        return $this->belongsTo(LifeStock::class, 'life_stock_id');
    }
}
