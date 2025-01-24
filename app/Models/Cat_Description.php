<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Description extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'cat_description';
    protected $fillable = array(
        
    );

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cat_images(){
        return $this->hasMany(Cat_Des_Images::class,'id','cat_des_id');
    }
}
