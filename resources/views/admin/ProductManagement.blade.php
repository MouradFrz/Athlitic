@extends('layouts.AdminLayout')

@section('meta')
    <title>Product Management</title>
    <link rel="stylesheet" href="{{ asset('sass/ProductsManagement.css') }}">
@endsection
@section('main')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.AddProduct') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex flex-column " id="AddProductForm">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" name="name" class="custom-input">
                        <Label>Description</Label>
                        <textarea name="description" id="" class="custom-input"></textarea>
                        <label for="">Image</label>
                        <input type="file" name="image" id="" accept="image/png, image/gif, image/jpeg"
                            class="form-control">
                        <label for="">Price</label>
                        <input type="text" name="price" class="custom-input">
                        <label for="">Category</label>
                        <select class="custom-input" name="category" id="">
                            <option value="Unclassified">Unclassified</option>
                            <option value="Shirt">Shirt</option>
                            <option value="Pants">Pants</option>
                        </select>
                        <label for="">Gender/Age</label>
                        <select class="custom-input" name="for" id="">
                            <option value="Kids">Kids</option>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                        </select>
                        <label for="">Collection</label>
                        <select class="custom-input" name="collection" id="">
                            @foreach ($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                            
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="custom-button"
                        onclick="document.querySelector('#AddProductForm').submit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="nav-bar">
            <h1 class="title">Products Management</h1>
            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="custom-button">Add Product</button>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @error('name')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('description')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('image')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('price')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('category')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('for')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
        @error('collection')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror

        <div class="products">
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

        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
