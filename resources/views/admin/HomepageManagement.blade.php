@extends('layouts.AdminLayout')
@section('meta')
    <title>Homepage Management</title>
@endsection

@section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.EditSlotValue') }}" method="POST"
                    class="d-flex flex-column " id="ChangeSlot">
                    @csrf
                    <label for="">Slot number</label>
                    <select class="custom-input" name="slot" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <label for="">Collection</label>
                    <select class="custom-input" name="collection" id="">
                        <option value="">None</option>
                        @foreach ($collections as $collection)
                            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#ChangeSlot').submit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.AddFeaturedProduct') }}" method="POST"
                    class="d-flex flex-column " id="AddProduct">
                    @csrf
                    <label for="">Choose the product</label>
                    <select name="product" id="">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#AddProduct').submit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="nav-bar">
    <h1 class="title">Homepage Management</h1>
</div>
@if (Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="my-5 mx-4">
    <div class="featured-collections">
        <h3>Current featured collections</h3>
        <p>Slot 1 : @foreach ($featured as $col)
            @if($col->featured==1)
            {{ $col->name }}
            @endif
        @endforeach</p>
        <p>
            Slot 2 : @foreach ($featured as $col)
            @if($col->featured==2)
            {{ $col->name }}
            @endif
        @endforeach
        </p>
        <p>
            Slot 3 : @foreach ($featured as $col)
            @if($col->featured==3)
            {{ $col->name }}
            @endif
        @endforeach
        </p>
        <button class="custom-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Change slot value</button>
    </div>
    <div class="featured-products">
        <h3>Current featured products</h3>
        
        @foreach ($featuredProducts as $product)
            <p >{{ $product->name }} <a href="{{ route('admin.RemoveFeaturedProduct',$product->id) }}">remove</a> </p>
        @endforeach
        <button class="custom-button"  data-bs-toggle="modal" data-bs-target="#AddProductModal">Add Product</button>
    </div>
</div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection