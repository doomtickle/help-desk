<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function subprojects()
    {
        return $this->hasMany(Subproject::class);
    }

}
