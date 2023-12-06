<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescriptions';

    protected $guarded = [];

    protected $dates = ['date'];

    /**
     * Get the doctor that owns the Prescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }

    /**
     * Get the patient that owns the Prescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }

    /**
     * Get all of the prs_medicines for the Prescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prs_medicines()
    {
        return $this->hasMany(MedicinePrescription::class, 'prescription_id', 'id');
    }

    /**
     * Get all of the medicines for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function medicines()
    {
        return $this->hasManyThrough(Medicine::class, MedicinePrescription::class);
    }





}
