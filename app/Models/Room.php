<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $guarded = [];

    /**
     * Get all of the doctors for the Designation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beds()
    {
        return $this->hasMany(Bed::class, 'room_id', 'id');
    }
}
