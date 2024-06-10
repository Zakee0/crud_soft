<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">

        <div class="container-fluid">
          <!-- Links -->
          <ul class="navbar-nav text-white">
            <li class="nav-item">
              <a class="nav-link text-white" href="/product">Product</a>
            </li>
    
          </ul>
        </div>
      
      </nav> 

      <h1 class="text-center mt-4">Create a new product</h1>

      <div class="container">
        <form  method="post" action="{{ route('products.store') }}">
            @csrf
           @method('post')
            <div class="mb-3 mt-3">
              <label for="name" class="form-label">Name:</label>
              <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
           
            <button type="submit" class="btn btn-dark">Submit</button>
          </form>
      </div>

     
</body>
</html>