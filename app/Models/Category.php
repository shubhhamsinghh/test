<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'category';
    protected $fillable = array();

    public $timestamps = false;

    public function cat_description(){
        return $this->hasMany(Cat_Description::class);
    }

    // public function home_images(){
    //     return $this->hasMany(Cat_Description::class)->where('is_home', 1);
    // }

}
