<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'contact';
    protected $fillable = array(
        
    );

    public $timestamps = false;
}
