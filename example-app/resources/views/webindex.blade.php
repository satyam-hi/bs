<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link href="/css/web.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const booksMain = document.querySelector(".booksMain");
            booksMain.addEventListener("wheel", function(event) {
                event.preventDefault();
                booksMain.scrollLeft += event.deltaY; // Scroll horizontally instead of vertically
            });
        });
    </script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="navUl">
                    <li>Home</li>
                    <li>books</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div style="height: 100vh; background-image: url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); background-size: cover; background-position: center;" class="position-relative w-100">
                <div class="position-absolute text-white d-flex flex-column align-items-center justify-content-center" style="top: 0; right: 0; bottom: 0; left: 0; background-color: rgba(0,0,0,.6);">
                    <span>SubHeadline</span>
                    <h1 class="mb-4 mt-2 font-weight-bold text-center">Enter Your Headline Here</h1>
                    <div class="text-center">
                        <!-- hover background-color: white; color: black; -->
                        <a href="#" id="filled" class="btn px-5 py-3 text-white mt-3 mt-sm-0 mx-1" style="border-radius: 30px; background-color: #9B5DE5;">Get Started</a>
                        <!-- hover background-color: #9B5DE5; color: white; -->
                        <a href="#" id="outlined" class="btn px-5 py-3 text-white mt-3 mt-sm-0 mx-1" style="border-radius: 30px; border:1px solid #9B5DE5;">Showcases</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="booksMain">
                <!-- <div class="card booksCard">
                    <a href=""></a>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh6Y66GUk52e2SXm1ELW6EhuvQ7ejikCz4Ug&s" class="img-thumbnail" alt="">
                </div> -->
        
                @foreach($products as $product)
                <div class="card booksCard" >
                    <a href="{{url('/read') }}?id={{$product->id}}">
                        <!-- <span>{{ $product->name }}</span> -->
                        <img src="{{url('/images') }}/{{$product->image}}" class="img-thumbnail" style="width: 100%;" alt=""> 
                        <!-- <span>{{ $product->plan }}</span> -->
                    </a>
                </div>
                @endforeach



            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-4 ">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>



        </div>



        <div class="row mt-3">
            <div class="col-sm-4 ">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- <p> web index page
        <a href="{{url('/user-login')}}"> User login </a>
        <a href="{{url('/admin-login')}}"> Admin login </a>
        <a href="{{url('/admin-dashboard')}}"> Admin dashboard </a>
        <a href="{{url('/user-log-oute')}}"> user logoute </a> 
        <a href="{{url('/on-bag')}}">  In your Bag  -> </a>
    </p>
    @foreach($products as $product)
    <a href="{{url('/read') }}?id={{$product->id}}">
    <span>{{ $product->name }}</span>
    <img src="{{url('/images') }}/{{$product->image}}" width="200px"   alt=""> <span>{{ $product->plan }}</span>
    <br>
    <br>
    </a>
    @endforeach -->







</body>

</html>