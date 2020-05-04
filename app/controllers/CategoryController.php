<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
class CategoryController extends BaseController{

    public function index(){
        $categories = Category::all();
        $msg = isset($_GET['msg']) ? $_GET['msg'] : null;
        $this->render('homepage.index_cate', [
                                            'listItem' => $categories,
                                            'errMsg' => $msg
                                        ]);
    }


    public function addCategory(){
        $cates = Category::all();
        $this->render('category.add-form-cate',  ['cates' => $cates]);
    }



     public function saveCategory(){
        $requestData = $_POST;
        $model = new Category();
        $model->fill($requestData);
        $model->save();
        header('location: ./category');
        
    }



        public function editCate(){
        $removeId = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$removeId){
            header("location: ./?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Category::find($removeId);
        
        if(!$model){
            $msg = "id không tồn tại!";
            header("location: ./?msg=$msg");
            die;
        }
        
        $cates = Category::all();
        $this->render('category.edit-form-cate', [
                                                'cates' => $cates,
                                                'model' => $model
                                            ]);

    }



    public function saveEditCate(){
        $id = $_GET['id'];
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id){
            header("location: ./?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Category::find($id);
        
        if(!$model){
            $msg = "id không tồn tại!";
            header("location: ./category?msg=$msg");
            die;
        }

        $requestData = $_POST;
        $model->fill($requestData);
;
        $model->save();
        header('location: ./category');
    }
    public function removeCate(){
        $removeId = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$removeId){
            header("location: ./category?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Category::find($removeId);
        
        if(!$model){
            $msg = "id không tồn tại!";
        }else{
            Category::destroy($removeId);
            $msg = "Xóa danh mục thành công";
        }

        header("location: ./category?msg=$msg");
        die;

    }

}

?>