<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">Vfix Technology</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('products.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}">Cart
                            @if(isset($cartTotalQuantity) && $cartTotalQuantity > 0)
                            <span class="badge bg-danger">{{ $cartTotalQuantity }}</span>
                        @endif
                        </a>
                    </li>

            </div>
        </div>
    </nav>

    <section class="py-5">
        <div class="container py-5">



            <div class="row g-4">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $product->image  }} " class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p>{{$product->price }}</p>

                                <a href="{{ route('add.cart',$product->id) }}" class="btn btn-primary">Add cart</a>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
