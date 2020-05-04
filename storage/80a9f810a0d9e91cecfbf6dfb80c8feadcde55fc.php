<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
             <style>
        [data-type="validator-error"] {
            color: red;
        }
    </style>

</head>
<body>
<div class="container">
        <nav class="nav">
            <a class="nav-link" href="./">Quản lý sản phẩm</a>
            <a class="nav-link" href="./add-product">Thêm sản phẩm</a>
            <a class="nav-link" href="./category">Quản lý danh mục</a>
            <a class="nav-link" href="./add-category">Thêm danh mục</a>
        </nav>
        
        <br>
        <h2>Tạo mới danh mục</h2>
        <br>

        <form action="./save-add-category" method="POST" onsubmit="return editProduct()" id="edit-product-form" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Cate_name</label>
                        <input type="text" name="cate_name" class="form-control" data-rule="required">
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" data-rule="required">
                    </div>

                    <div class="form-group">
                        <label for="">Show menu</label>
                        <input type="number" name="show_menu" class="form-control" data-rule="required|float">
                    </div>

                    <div class="form-group">
                        <label for="">Desc</label>
                        <textarea name="desc" class="form-control" rows="5"  data-rule="required"></textarea>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Created at</label>
                        <input type="date" name="created_at" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Update at</label>
                        <input type="date" name="update_at" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Created by</label>
                        <input type="number" name="created_by" value="-1" class="form-control">
                    </div>

                </div>



                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="./" class="btn btn-danger">Hủy</a>
                </div>
               </div>
        </form>
        
    </div>

    <script src="./js/js-form-validator-2.1/js-form-validator.min.js"></script>

        <script>
             var validator = new Validator(document.querySelector('#edit-product-form'), function(err, res) {
                if (res === true) {
                    editProduct();
                }

                return false;
            }, {
                rules: {
                    checkImgUrl: function(value) {
                        return (/\.(gif|jpe?g|tiff|png|webp|bmp)$/i).test(value);
                    }
                },
                messages: {
                    en: {
                        required: {
                            empty: 'Không được để trống',
                            incorrect: 'Nhập sai thông tin'
                        },
                        minlength: {
                            empty: 'Hãy nhập tối thiểu {0} ký tự',
                            incorrect: 'Hãy nhập tối thiểu {0} ký tự'
                        },
                        checkImgUrl: {
                            empty: 'Nhập đường dẫn ảnh',
                            incorrect: 'Đường dẫn ảnh không đúng định dạng'
                        },
                        float: {
                            empty: 'Hãy nhập số',
                            incorrect: 'Hãy nhập số'
                        }
                    }
                }
            });
        </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/category/add-form-cate.blade.php ENDPATH**/ ?>