<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppoitmentImage extends Model
{
    use HasFactory;

    protected $table = 'appoitment_images';
    protected $guarded = [];

    /**
     * Get the appoitment that owns the AppoitmentImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function appoitment()
    {
        return $this->belongsTo(Appoitment::class, 'appoitment_id', 'id');
    }
}
