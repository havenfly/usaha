<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroModel extends Model
{
    protected $table = "hero";
    protected $guarded =[];
    protected $fillable = [
        'nama_hero',
        'rolehero_id',
        'jenis_kelamin',
        'tier'
    ];

    public function roleHero()
    {
        return $this->belongsTo(RoleHeroModel::class, 'rolehero_id', 'id');
    }



}

    

