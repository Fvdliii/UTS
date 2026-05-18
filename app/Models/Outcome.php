<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['income_id', 'outcome', 'from', 'nominal', 'tanggal_outcome', 'description' ])]
class Outcome extends Model
{
    public function income(): BelongsTo
    {
        return $this->belongsTo(Income::class);
    }
}
