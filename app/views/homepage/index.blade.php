<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <p class="text-danger">{{$errMsg}}</p>
        <table class="table table-stripped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Category</th>
                <th>
                    <a href="./add-product" class="btn btn-success">Add new</a>
                </th>
            </thead>
            <tbody>
                @foreach($listItem as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        <td>
                            <img src="{{$pro->image}}" class="img-avatar" width="100">
                        </td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->getCategoryName()}}</td>
                        <td>
                            <a href="./edit-product?id={{$pro->id}}" class="btn btn-primary">Edit</a>
                            <a href="./remove-product?id={{$pro->id}}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
</body>
</html>