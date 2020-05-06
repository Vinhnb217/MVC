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
        <p class="text-danger">{{$errMsg}}</p>
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
                @foreach($listItem as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->cate_name}}</td>
                        <td>{{$pro->show_menu}}</td>
                        <td>{{$pro->created_by}}</td>
                        <td>
                           <a href="./edit-category?id={{$pro->id}}" class="btn btn-primary">Edit</a>
                           <a href="./remove-category?id={{$pro->id}}"  class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        
        
    </script>
</body>
</html>