<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Port_Details extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'port_details';
    protected $fillable = array(
        
    );

    public $timestamps = false;

    public function portfolio(){
        return $this->belongsTo(Portfolio::class);
    }
    public function tab(){
        return $this->belongsTo(Tabs::class);
    }
}
