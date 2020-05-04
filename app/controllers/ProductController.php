<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
class ProductController extends BaseController{

    public function addForm(){
        // lấy dữ liệu từ bảng danh mục
        $cates = Category::all();
        $this->render('product.add-form', ['cates' => $cates]);
    }

    public function editForm(){
        $removeId = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$removeId){
            header("location: ./?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Product::find($removeId);
        
        if(!$model){
            $msg = "id không tồn tại!";
            header("location: ./?msg=$msg");
            die;
        }
        
        $cates = Category::all();
        $this->render('product.edit-form', [
                                                'cates' => $cates,
                                                'model' => $model
                                            ]);

    }
    public function remove(){
        $removeId = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$removeId){
            header("location: ./?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Product::find($removeId);
        
        if(!$model){
            $msg = "id không tồn tại!";
        }else{
            Product::destroy($removeId);
            $msg = "Xóa sản phẩm thành công";
        }

        header("location: ./?msg=$msg");
        die;

    }

    public function saveAdd(){
        $requestData = $_POST;
        $imgFile = $_FILES['image'];

        $model = new Product();

        // quy trình bình thường
        // gán các giá trị của form cho các thuộc tính của instance
        // các thuộc tình phải trùng tên với các cột trong bảng mà model đại diện
        // $model->name = $requestData['name'];
        // $model->cate_id = $requestData['cate_id'];
        // $model->price = $requestData['price'];
        // $model->short_desc = $requestData['short_desc'];
        // $model->detail = $requestData['detail'];
        // $model->star = $requestData['star'];
        // $model->views = $requestData['views'];

        $model->fill($requestData);

        $filename = "";
        // nếu có ảnh up lên thì lưu ảnh
        if($imgFile['size'] > 0){
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = 'public/uploads/' . $filename;
        }
        $model->image = $filename;
        $model->save();
        header('location: ./');
        
    }

    public function saveEdit(){
        $id = $_GET['id'];
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$id){
            header("location: ./?msg=không đủ thông tin để xóa");
            die;
        }
        // kiểm tra xem id có thật hay không
        $model = Product::find($id);
        
        if(!$model){
            $msg = "id không tồn tại!";
            header("location: ./?msg=$msg");
            die;
        }

        $requestData = $_POST;
        $model->fill($requestData);

        $imgFile = $_FILES['image'];
        $filename = $model->image;
        // nếu có ảnh up lên thì lưu ảnh
        if($imgFile['size'] > 0){
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], './public/uploads/' . $filename);
            $filename = 'public/uploads/' . $filename;
        }
        $model->image = $filename;
        $model->save();
        header('location: ./');
    }

    



}

?>