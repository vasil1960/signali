<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    protected $table = 'iag112new.signali';

    protected $primaryKey = 'id';

    public function podelenie()
    {
        return $this->hasOne(Podelenia::class,'Pod_Id','pod_id');
    }
    
    public function rdg()
    {
        return $this->hasOne(Rdg::class,'Pod_Id','glav_pod');
    }
}
