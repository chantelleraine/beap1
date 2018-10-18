<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calamity extends Model
{
    //Table Name
    protected $table = 'calamities';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public  $timestamps = true;
}
