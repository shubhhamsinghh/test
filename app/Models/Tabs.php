<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabs extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'tabs';
    protected $fillable = array();

    public $timestamps = false;


}
