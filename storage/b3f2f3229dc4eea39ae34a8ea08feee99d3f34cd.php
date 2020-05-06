<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giao diện quản lý danh mục</title>
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
        <p class="text-danger"><?php echo e($errMsg); ?></p>
        <table class="table table-stripped">
            <thead class="">
                <th>ID</th>
                <th>Cate_name</th>
                <th>Show_menu</th>
                <th>Created_by</th>
                 <th>
                    <a href="./add-category" class="btn btn-success">Add new</a>
                </th>
                
            </thead>
            <tbody class="container">
                <?php $__currentLoopData = $listItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pro->id); ?></td>
                        <td><?php echo e($pro->cate_name); ?></td>
                        <td><?php echo e($pro->show_menu); ?></td>
                        <td><?php echo e($pro->created_by); ?></td>
                        <td>
                           <a href="./edit-category?id=<?php echo e($pro->id); ?>" class="btn btn-primary">Edit</a>
                           <a href="./remove-category?id=<?php echo e($pro->id); ?>"  class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        
        
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/homepage/index_cate.blade.php ENDPATH**/ ?>