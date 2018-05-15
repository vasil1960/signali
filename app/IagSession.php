<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\IagUser;

class IagSession extends Model
{
    protected $table = "nug.sessions";

    protected $primaryKey = "ID";

    public $timestamps = false;

    protected $fillable = ['ActiveSession'];

    public function iaguser(){

        return $this->hasOne( 'App\IagUser','ID', 'userId' );

    }


    // protected $connection = 'mysql';



}
