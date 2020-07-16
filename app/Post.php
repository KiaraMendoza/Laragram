<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = []; // Only use if we know that we are validating all our forms.

    public function user() {
        return $this->belongsTo(User::class);
    }
}
