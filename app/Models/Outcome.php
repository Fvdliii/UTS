<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;


#[Fillable(['outcome', 'from', 'nominal', 'tanggal_outcome', 'description', 'income_id'])]
class Outcome extends Model
{
    public function income(): BelongsTo
    {
        return $this->belongsTo(Income::class);
    }
}
