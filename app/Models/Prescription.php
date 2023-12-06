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
     * Get all of the medicines for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function medicines()
    {
        return $this->hasManyThrough(Medicine::class, MedicinePrescription::class);
    }


}
