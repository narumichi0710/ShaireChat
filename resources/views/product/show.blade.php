@extends('layouts.app')

@section('content')

<div class="container pt-4" style="text-align:center;">
    <div class="row">
        <div class="col-md-4">
            
            <h5 class="card-title"> {{ $products->product_name }}</h5>
            <p class="card-text">{{ $products->product_content }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

        </div> 
        <div class="col-md-8">

            <h5 class="card-title"> {{ $products->product_name }}</h5>
            <p class="card-text">{{ $products->product_content }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>

        </div>
    </div>
</div>



@endsection