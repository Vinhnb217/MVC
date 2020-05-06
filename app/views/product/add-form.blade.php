<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
        <h2>Tạo mới sản phẩm</h2>
        <br>

        <form action="./save-add-product" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                        <p class="text-danger">{{$nameErr}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            @foreach($cates as $ca)
                            <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{$cateErr}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control">
                        <p class="text-danger">{{$priceErr}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="4"></textarea>
                        <p class="text-danger">{{$descErr}}</p>
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                        <p class="text-danger">{{$imageErr}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" class="form-control">
                        <p class="text-danger">{{$starErr}}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="views" class="form-control">
                        <p class="text-danger">{{$viewErr}}</p>
                    </div>

                </div>



                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="6"></textarea>
                        <p class="text-danger">{{$detailErr}}</p>
                    </div>
                </div>

                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="./" class="btn btn-danger">Hủy</a>
                </div>
               </div>
        </form>
        
    </div>
</body>
</html>