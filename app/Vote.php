<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    // Attributes that we allow for mass assignment
    protected $fillable = ['suggestion_id'];
    // Attirbutes that we do NOT allow for mass assignment
    // protected $guarded = ['id'];

    public function suggestion()
    {
        return $this->belongsTo('App\Suggestion');
    }
}
