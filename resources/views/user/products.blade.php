@extends('layouts.UserLayout')

@section('meta')
    <title>Shop</title>
    <link rel="stylesheet" href="{{ asset('sass/products.css') }}">
@endsection

@section('main')
<div class="global-wrapper">
    <div class="header-wrap">
        <div class="container">
            <div class="header">
                <h1>Shop</h1>
            </div>
        </div>
    </div>
    <div class="main-content-wrap">
        <div class="container">
            <div class="main-content">
                <div class="filter">
                    <form action="{{ route('user.shop') }}">
                        <h3>Keyword</h3>
                        <input type="text" name="keyword" class="custom-input mb-3 w-100" placeholder="Search ...">
                        <h3>Gender/Age</h3>
                        <input type="checkbox" name="Men" id=""> <span>Male</span> <br>
                        <input type="checkbox" name="Women" id=""> <span>Female</span> <br>
                        <input type="checkbox" name="Kids" id="" class="mb-3"> <span>Kids</span>
                        <h3>Collection</h3>
                        <select name="collection" class="custom-input w-100 mb-3" id="">
                            <option value="">Any</option>
                            @foreach ($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                            
                        </select>
                        <h3>Price</h3>
                        <div class="d-flex mb-3">
                            <input type="text" name="minprice"  placeholder="Min"  class="custom-input" id="" style="max-width: 50%">
                            <input type="text" name="maxprice" placeholder="Max" class="custom-input" id="" style="max-width: 50%">
                        </div>
                        <input type="checkbox" name="onsale" id="" class="mb-3"> <span>On Sale</span>
                        <button class="custom-button d-block" style="max-width: 100%">Search</button>
                    </form>
                </div>
                <div class="products-wrapper">
                    <div class="results">
                        <p class="text-mute" style="margin-bottom: 0">Results found : {{ $products->total() }}</p>
                        <button class="custom-button">Order</button>
                    </div>
                    <div class="products">
                        @foreach ($products as $product)
                        <div class="product">
                            <img src="{{ asset('img/products/'.$product->image) }}" alt="">
                            <div>
                                <h1 class="m-0">{{ $product->name }}</h1>
                                <p><span class=" @if($product->promo)old-price @else new-price m-0 @endif">${{ $product->price }}</span>
                                    @if ($product->promo)
                                    <span class="new-price">${{ round($product->price - ($product->price * $product->promo) / 100, 2) }}</span>
                                    @endif
                                <div class="buttons"> 
                                    <button class="custom-button"> <i class="bi bi-cart"></i></button>
                                    <a href="" class="close-button">View More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                
                    </div>
                    <div class="mt-5">{{ $products->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
@endsection