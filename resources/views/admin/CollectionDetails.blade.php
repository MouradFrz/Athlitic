@extends('layouts.AdminLayout')


@section('meta')
    <title>Collection details</title>
    <link rel="stylesheet" href="{{ asset('sass/collectiondetails.css') }}">
@endsection
@section('main')
<div class="nav-bar">
    <h1 class="title">Collection Details</h1>
</div>
<div class="products">
    @if(count($products))
        @foreach ($products as $product)
        <div class="product">
            <img class="product-image" src="{{ asset('img/products/' . $product->image) }}" alt="">
            <div class="product-info">
                <p class="title">{{ $product->name }}</p>
                <p class="desc">{{ $product->description }}</p>
                <p class="price"><span
                        class="original @if ($product->promo) line-through @endif">${{ $product->price }}</span>
                    @if ($product->promo)
                        <span
                            class="promo">${{ round($product->price - ($product->price * $product->promo) / 100, 2) }}</span>
                    @endif
                </p>
            </div>
            <a href="{{ route('admin.ProductDetails',$product->id) }}" class="custom-button">Edit Product</a>
        </div>
    @endforeach
    @else
    <h4>This collection has no products.</h4>
    @endif
    

</div>
@endsection

