<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    /**
     * Get the curso that owns the competency.
     */
    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
