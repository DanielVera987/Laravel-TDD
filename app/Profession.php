<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = "profession";

    protected $fillable = ["title"];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function users() {
        $this->hasMany(User::class);
    }
}
