@extends('layouts.app')

@section('content')

<div class="products_gallery pt-4 col-md-9" style="margin:0 auto;">
    @foreach($products as $product)
    <a href="{{ route('product.show', $product->id) }}">  
        <div class="card">
            <div class="row"> 
                <div class="col-md-4">
                    <img href="{{ $product->product_image }}" class="bd-placeholder-img" style="width:100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_content }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>    
    </a>
   
    @endforeach
</div>
</div>



@endsection