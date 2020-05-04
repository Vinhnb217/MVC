<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập nhật sản phẩm</title>
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
        
        
        <h3>Edit sản phẩm</h3>
        <form action="./save-edit-product?id=<?php echo e($model->id); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($model->name); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option 
                                <?php if($ca->id == $model->cate_id): ?> selected <?php endif; ?>
                                value="<?php echo e($ca->id); ?>"><?php echo e($ca->cate_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control" value="<?php echo e($model->price); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="4"><?php echo e($model->short_desc); ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-4 offset-4">
                            <img src="<?php echo e($model->image); ?>" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" class="form-control" value="<?php echo e($model->star); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="views" class="form-control" value="<?php echo e($model->views); ?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="6"><?php echo e($model->detail); ?></textarea>
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
</html><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/product/edit-form.blade.php ENDPATH**/ ?>