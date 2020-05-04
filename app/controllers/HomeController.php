<?php
namespace App\Controllers;
use App\Models\Product;
class HomeController extends BaseController{

    public function index(){
        $products = Product::all();

        // $this->render('homepage.index', ['listItem' => $products]);
        $msg = isset($_GET['msg']) ? $_GET['msg'] : null;
        $this->render('homepage.index', [
                                            'listItem' => $products,
                                            'errMsg' => $msg
                                        ]);
    }

    public function detail(){
        return "Trang chi tiết 1 sản phẩm";
    }

    public function contact(){
        return "trang liên hệ của dự án ";
    }

}

?>