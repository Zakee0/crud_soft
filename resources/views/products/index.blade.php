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
              <a class="nav-link text-white" href="">Product</a>
            </li>
    
          </ul>
        </div>
      
      </nav> 

      <div class="container">
        <h1 class="mt-3">Product</h1>

        <div>
          {{-- @if (session()->has('Success'))
            <div class="alert alert-success">
              {{session('Success') }}
            </div>
          @endif --}}
          @if (session()->has('Success'))
          <div class="alert alert-success" id="success-alert">
        {{ session('Success') }}
          </div>
          @endif
        </div>

        <div class="text-end">
            <a href="/product/create" class="btn btn-dark"> Create a Product</a>
        </div>
      </div>

      {{-- table  --}}
      <div class="container">
      <table class="table table-dark mt-5">
       
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
      
       @foreach ($products as $product)
         
          <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->email }}</td>
            <td><a class="btn btn-info" href="{{ route('products.edit',["product"=>$product]) }}">Edit</a> </td>

            <td>
              <form action="{{ route('products.delete',["product"=>$product]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btn btn-danger" type="submit" value="Delete">
              </form>
            </td>
            
          </tr>

       @endforeach

          </table>

              <!-- Pagination Links -->
              <div class="d-flex justify-content-center">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>

        <script>
          document.addEventListener("DOMContentLoaded", function() {
              // Set a timeout to hide the alert after 5 seconds (5000 milliseconds)
              setTimeout(function() {
                  let alert = document.getElementById('success-alert');
                  if (alert) {
                      alert.style.transition = 'opacity 0.2s ease';
                      alert.style.opacity = '0';
                      setTimeout(function() {
                          alert.remove();
                      }, 500); // Adjust this to match the transition duration
                  }
              }, 5000); // 5 seconds
          });
      </script>

</body>
</html>