<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $table = 'beds';

    protected $guarded = [];

    /**
     * Get all of the doctors for the Designation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }


    public function scopeIsAvailable($query){
        return $query->where('is_available', 1);
    }
}
