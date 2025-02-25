<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Buy Page</h1>

  <form action="{{url('/buy-action')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container py-5">
      <div class="row">
        <h1 class="text-center">buy</h1>
            <!-- {{$id}} -->
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">id</label>
          <input type="text" name="id" value="{{$id}}" disabled  class="form-control" id="exampleFormControlInput1" placeholder="Email">
          <input type="hidden" name="id" value="{{$id}}"   class="form-control" id="exampleFormControlInput1" placeholder="Email">
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label"> price - Rs -</label>
          <input type="text" name="price" class="form-control" value="70" id="exampleFormControlInput1" placeholder="price">
        </div>
        <bUtton type="Submit" class="btn btn-primary"> Buy</bUtton>
      </div>
    </div>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>