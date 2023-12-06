<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinePrescription extends Model
{
    use HasFactory;

    protected $table = 'medicine_prescriptions';

    protected $guarded = [];

    /**
     * Get the medicine that owns the MedicinePrescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');
    }

    /**
     * Get the prescription that owns the MedicinePrescription
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id', 'id');
    }
}
