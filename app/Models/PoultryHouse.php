<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoultryHouse extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'poultry_houses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'poultry_house_id',
        'capacity',
        'number_of_birds',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function poultry_house()
    {
        return $this->belongsTo(Farm::class, 'poultry_house_id');
    }
}
