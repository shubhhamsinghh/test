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

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function sub_category(){
        return $this->hasMany(Sub_Category::class,'cat_id','id');
    }
    
    public function sub_cat_order(){
        return $this->hasMany(Sub_Category::class,'cat_id','id')->orderByRaw('ISNULL(sr_no), sr_no ASC');
    }
}
