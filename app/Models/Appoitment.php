<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoitment extends Model
{
    use HasFactory;

    protected $table = 'appoitments';

    protected $guarded = [];

    protected $dates = ['date'];

    /**
     * Get the doctor that owns the Appoitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }


    /**
     * Get the patient that owns the Appoitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }

    /**
     * Get all of the images for the Appoitment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(AppoitmentImage::class, 'appoitment_id', 'id');
    }
}
