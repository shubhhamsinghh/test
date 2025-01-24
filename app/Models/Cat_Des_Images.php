<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Des_Images extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'cat_des_images';
    protected $fillable = array(
        
    );

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
