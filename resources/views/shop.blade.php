@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
        <div class="col-xs-12">
            <form method="get" action="{{route('search')}}" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" class="form-control" name="title"
                           placeholder="Search term...">

                    <span class="input-group-btn">
                        <input type="submit" value="Search" class="btn btn-success">
                    </span>
                </div>
            </form>
        </div>
        <br>
        <div class="clearfix"></div>
        <div class="row justify-content-center">

            <div class="col-md-4">

                <p>
                    <label for="amount">Price range:</label>
                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>

                <div id="slider-range"></div>
                <input type="hidden" id="min"  name="min" value="0">
                <input type="hidden" name="max" id="max" value="10000">
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Products In Our Store</h4>
                    </div>
                </div>
                <hr>
                <div id="filterProducts">
                    <div class="row">
                        @foreach($products as $pro)
                            <div class="col-lg-3">
                                <div class="card" style="margin-bottom: 20px; height: auto;">
                                    <img src="/images/{{ $pro->image_path }}"
                                         class="card-img-top mx-auto"
                                         style="height: 150px; width: 150px;display: block;"
                                         alt="{{ $pro->image_path }}"
                                    >
                                    <div class="card-body">
                                        <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                        <p>${{ $pro->price }}</p>
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                            <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                            <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                            <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                            <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                            <input type="hidden" value="1" id="quantity" name="quantity">
                                            <div class="card-footer" style="background-color: white;">
                                                <div class="row">
                                                    <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 3000,
                step: 10,
                values: [ 0, 3000],
                stop: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    $("#min").val(ui.values[0]);
                    $("#max").val(ui.values[1]);
                    filterData();
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );



            function filterData() {

                var min = $("#min").val();
                var max = $("#max").val();

                var base_url = "{{asset('/')}}";
                $.ajax({
                    url: base_url + "filter_price",
                    method: "post",
                    data:  {
                        "_token": "{{ csrf_token() }}",
                        "min"   : min,
                        "max"   : max,
                    },
                    success: function (response) {
                        $("#filterProducts").html(response);
                    }
                })
            }
        } );
    </script>
@endsection