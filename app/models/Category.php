<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{
    protected $table = "categories";
    public $fillable = ['cate_name', 'slug', 'show_menu', 'desc', 
                        'created_at', 'updated_at', 'created_by']; 
}



?>