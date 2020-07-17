<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //protected $fillable = ['title', 'description', 'url', 'image']; This or protected $guarded = [];
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/default.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
