<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'room_id',
        'user_id',
        'date',
        'start_date_time',
        'end_date_time',
        'purpose',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    protected function startDateTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d M H:i'),
        );
    }

    protected function endDateTime(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d M H:i'),
        );
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date_time', '>', now())->orderBy('start_date_time');
    }

    public function room(){
        return $this->hasOne(Room::class, 'id', 'room_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
