<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    protected $guarded = [];

    protected $dates = ['date'];


    /**
     * Get all of the expense_materials for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expense_materials()
    {
        return $this->hasMany(ExpenseMaterial::class, 'expense_id', 'id');
    }

    /**
     * Get all of the materials for the Expense
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function materials()
    {
        return $this->hasManyThrough(Material::class, ExpenseMaterial::class);
    }


    public function get_total(){
        return $this->expense_materials()->sum('amount');
    }
}
