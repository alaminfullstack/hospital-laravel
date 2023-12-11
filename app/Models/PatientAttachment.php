<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAttachment extends Model
{
    use HasFactory;

    protected $table = 'patient_attachments';

    protected $guarded = [];

    /**
     * Get the patient that owns the PatientAttachment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }


    /**
     * Get the centeral that owns the PatientAttachment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function centeral()
    {
        return $this->belongsTo(Centeral::class, 'centeral_id', 'id');
    }
}
