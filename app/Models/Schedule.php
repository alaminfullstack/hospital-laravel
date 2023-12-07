<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    // protected $casts = ['job_time' => 'object'];

    protected $guarded = [];

    /**
     * Get the doctor that owns the Schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

}
