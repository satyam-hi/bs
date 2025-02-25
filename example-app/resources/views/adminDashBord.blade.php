<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Admin dashboard</h1>
    <a href="{{url('/admin-logout')}}"> logout</a>




    <form action="{{url('/product-action')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center">Add product </h1>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                    <input type="text" name="tittle" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="Image">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Pdf</label>
                    <input type="file" name="pdf" class="form-control" id="exampleFormControlInput1" placeholder="Pdf">
                </div>

                <div class="mb-3">
                    <select class="form-select" name="plan" aria-label="Default select example">
                        <option selected value="paid">paid</option>
                        <option value="free">free</option>
                    </select>
                </div>

                <div class="mb-3">
                    <select class="form-select" name="publication" aria-label="Default select example">
                        @foreach($publication as $pub)
                        <option selected  value="{{$pub->name}}">{{$pub->name}}</option>
                      @endforeach
                    </select>
                </div>

                <bUtton type="Submit" class="btn btn-primary"> Add Product</bUtton>
            </div>
        </div>
    </form>


    <form action="{{url('/publication-action')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container py-5">
            <div class="row">
                <h1 class="text-center">Add publication </h1>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Publication</label>
                    <input type="text" name="Publication" class="form-control" id="exampleFormControlInput1" placeholder="Publication">
                </div>
                <bUtton type="Submit" class="btn btn-primary"> Add Publication</bUtton>
            </div>
        </div>
    </form>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>