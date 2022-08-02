@extends('layouts.adminLayout')


@section('meta')
    <title>Stock Management</title>
    <link rel="stylesheet" href="{{ asset('sass/StockManagement.css') }}">
@endsection

@section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="{{ route('admin.AddStock') }}" method="POST"
                    class="d-flex flex-column " id="AddStockForm">
                    @csrf
                    <label for="">Product</label>
                    <select class="custom-input" name="product" id="">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label for="">Size</label>
                    <select name="size" id="">
                        <option value="XXS">XXS</option>
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                        <option value="XXL">XXL</option>
                    </select>
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" onkeypress="return isNumber(event)" maxlength="4" id="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#AddStockForm').submit()">Add</button>
            </div>
        </div>
    </div>
</div>
    <div class="nav-bar">
        <h1 class="title">Stock Management</h1>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="custom-button">Add Stock</button>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@error('product')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('quantity')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
@error('size')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
    <div class="stocks">
        {{-- {{ $stocks }} --}}
        @foreach ($stocks as $stock)
        <div class="stock">
            <img src="{{ asset('img/products/'.$stock->image) }}" alt="">
            <div class="stock-info @if(!$stock->currentcount) mute @endif">
                <h1>{{ $stock->name }}</h1>
                <p>Size : <span>{{ Str::upper($stock->size) }}</span></p>
                <p>Stock added : <span>{{ $stock->created_at }}</span></p>
                <p>Total quantity : <span>{{ $stock->initialcount }}</span></p>
                <p>Remaining quantity : <span>{{ $stock->currentcount }}</span></p>
            </div>
        </div>
        @endforeach


       
    </div>

    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }</script>
@endsection
