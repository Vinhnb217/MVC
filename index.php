<?php
session_start();
// tôi muốn: "tất cả các request tới thư mục mvc phải bắt buộc đi qua file index.php"
// thu thập các url gửi lên project
$url = isset($_GET['url']) ? $_GET['url'] : "/";

require_once './vendor/autoload.php';
require_once './commons/database-config.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
switch ($url) {
    case '/':
        $ctr = new HomeController();
        echo $ctr->index();
        break;
    
    case 'category':
        $ctr = new CategoryController();
        echo $ctr->index();
        break;

    case 'add-category' :
        $ctr = new CategoryController();
        echo $ctr->addCategory();
        break;

    case 'save-add-category':
        $ctr = new CategoryController();
        echo $ctr->saveCategory();
        break;   

    case 'remove-category':
        $ctr = new CategoryController();
        echo $ctr->removeCate();
        break; 

    case 'edit-category';
        $ctr = new CategoryController();
        echo $ctr->editCate();
        break;  

    case 'save-edit-category':
        $ctr = new CategoryController();
        echo $ctr->saveEditCate();  
        break;            

    case 'add-product':
        $ctr = new ProductController();
        echo $ctr->addForm();
        break;

    case 'save-add-product':
        $ctr = new ProductController();
        $ctr->saveAdd();
        break;

    case 'remove-product' :
        $ctr = new ProductController();  
        $ctr -> remove(); 
     
    case 'edit-product':
        $ctr = new ProductController();
        $ctr->editForm();
        break; 

    case 'save-edit-product':
        $ctr = new ProductController();
        $ctr->saveEdit();
        break;    

    default:
        echo "Đường dẫn không tồn tại";
        break;
}

?>