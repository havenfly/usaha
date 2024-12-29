<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHeroModel extends Model
{
    protected $table = "role_hero";
    protected $guarded =[];
    protected $fillable = ['Role'];

    public function heroes()
    {
        return $this->hasMany(HeroModel::class, 'rolehero_id', 'id');
    }
}
