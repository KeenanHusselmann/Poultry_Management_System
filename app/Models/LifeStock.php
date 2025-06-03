<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LifeStock extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'life_stocks';

    public const BREED_SELECT = [
        'Chicken' => 'Chicken',
        'Duck'    => 'Duck',
        'Turkey'  => 'Turkey',
    ];

    public const HEALTH_STATUS_SELECT = [
        'Health' => 'Health',
        'Sick'   => 'Sick',
        'Dead'   => 'Dead',
    ];

    public const PURPOSE_SELECT = [
        'Layer'    => 'Layer',
        'Broiler'  => 'Broiler',
        'Heritage' => 'Heritage',
    ];

    protected $dates = [
        'date_of_birth',
        'purchase_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'breed',
        'purpose',
        'date_of_birth',
        'weight',
        'purchase_date',
        'notes',
        'health_status',
        'number_of_birds',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function eggsEggProductions()
    {
        return $this->hasMany(EggProduction::class, 'eggs_id', 'id');
    }

    public function lifeStockPesticides()
    {
        return $this->hasMany(Pesticide::class, 'life_stock_id', 'id');
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPurchaseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPurchaseDateAttribute($value)
    {
        $this->attributes['purchase_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
