<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'portfolio';
    protected $fillable = array();

    public $timestamps = false;


    public function port_details(){
        return $this->hasMany(Port_Details::class);
    }

}
