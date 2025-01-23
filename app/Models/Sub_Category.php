<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'sub_category';
    protected $fillable = array(
        
    );

    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
