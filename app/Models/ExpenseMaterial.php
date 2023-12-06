<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseMaterial extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $guarded = [];

    /**
     * Get the expense that owns the ExpenseMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id', 'id');
    }

    /**
     * Get the material that owns the ExpenseMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo(Material::class, 'material_id', 'id');
    }

}
