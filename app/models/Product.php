<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model{
    protected $table = "products";
    public $fillable = ['name', 'cate_id', 'price', 'short_desc', 
                        'detail', 'star', 'views'];



                        public function getCategoryName(){
                            $paren = Category::find($this->cate_id);
                            if ($paren) {
                                return $paren->cate_name;
                            }
                            return $paren = null;
                        }
}

?>
