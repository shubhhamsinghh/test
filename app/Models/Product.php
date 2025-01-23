<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array(
        
    );

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sub_category(){
        return $this->belongsTo(Sub_Category::class,'sub_category_id');
    }
}
