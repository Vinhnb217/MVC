<?php
namespace App\Controllers;
use App\Models\Category;
use App\Models\Product;
class ProductController extends BaseController{

    public function addForm(){
        // lấy dữ liệu từ bảng danh mục
        $cates = Category::all();
        $name_err = isset($_GET['name_err']) ? $_GET['name_err'] : null;
        $cate_err = isset($_GET['cate_err']) ? $_GET['cate_err'] : null;
        $price_err = isset($_GET['price_err']) ? $_GET['price_err'] : null;
        $desc_err = isset($_GET['desc_err']) ? $_GET['desc_err'] : null;
        $star_err = isset($_GET['star_err']) ? $_GET['star_err'] : null;
        $view_err = isset($_GET['view_err']) ? $_GET['view_err'] : null;
        $detail_err = isset($_GET['detail_err']) ? $_GET['detail_err'] : null;

        $this->render(
            'product.add-form',
            [
                'cates' => $cates,
                'nameErr' => $name_err,
                'cateErr' => $cate_err,
                'priceErr' => $price_err,
                'descErr' => $desc_err,
                'starErr' => $star_err,
                'viewErr' => $view_err,
                'detailErr' => $detail_err
            ]
        );

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



        //Validate 

        $requestData = $_POST;
        if (empty($requestData['name'])) {
            $name_err = 'Bạn chưa nhập tên sản phẩm';
        }
        if (empty($requestData['cate_id'])) {
            $cate_err = 'Bạn chưa chọn dạnh mục';
        }
        if (empty($requestData['price'])) {
            $price_err = 'Bạn chưa nhập giá';
        }
        if (empty($requestData['short_desc'])) {
            $desc_err = 'Bạn chưa nhập mô tả';
        }
        if (empty($requestData['star'])) {
            $star_err = 'Bạn chưa nhập sao';
        }
        if (empty($requestData['views'])) {
            $view_err = 'Bạn chưa nhập lượt xem';
        }
        if (empty($requestData['detail'])) {
            $detail_err = 'Bạn chưa nhập chi tiết sản phẩm';
        }

        if (isset($name_err) || isset($cate_err) || isset($price_err) || isset($desc_err) || isset($star_err) || isset($view_err) || isset($detail_err)) {
            header("location: add-product?name_err=$name_err&cate_err=$cate_err&price_err=$price_err&desc_err=$desc_err&star_err=$star_err&view_err=$view_err&detail_err=$detail_err");
            die;
        }


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