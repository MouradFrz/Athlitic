@extends('layouts.AdminLayout')

@section('meta')
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('sass/ProductDetails.css') }}">
    
@endsection
@section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete a product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.DeleteProduct',$product->id) }}" method="POST"
                    class="d-flex flex-column " id="DeleteForm">
                    @csrf
                    <p>Are you sure you want to delete this product?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#DeleteForm').submit()">DELETE</button>
            </div>
        </div>
    </div>
</div>



<div>
    <div class="nav-bar">
        <h1 class="title">{{ $product->name }}</h1>
        <button class="custom-button" id="edit-btn">Edit Product</button>
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
        @error('sale')
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

    <div>
        <div class="main-section">
            <img src="{{ asset('img/products/'.$product->image) }}" alt="">
            <div class="product-info">
                <form action="{{ route('admin.EditProduct',$product->id) }}" method="POST" enctype="multipart/form-data"
                        class="d-flex flex-column ">
                        @csrf
                        <label for="">Name</label>
                        <input type="text" name="name" class="custom-input editable" value="{{ $product->name }}" disabled>
                        <Label>Description</Label>
                        <textarea name="description" id="" class="custom-input  editable" value="" disabled>{{ $product->description }}</textarea>
                        <label for="">Image</label>
                        <input disabled type="file" name="image" id="" accept="image/png, image/gif, image/jpeg"
                            class="form-control  editable">
                        <label for="">Price</label>
                        <input disabled type="text" name="price" value=" {{ $product->price }} " class="custom-input editable">
                        <label for="">Current Sale</label>
                        <input disabled type="text" name="sale" value=" {{ $product->promo }} " class="custom-input editable">
                        <label for="">Category</label>
                        <select disabled class="custom-input editable" name="category" id="">
                            <option default value="{{ $product->category }}">{{ $product->category }}</option>
                            <option value="Unclassified">Unclassified</option>
                            <option value="Shirt">Shirt</option>
                            <option value="Pants">Pants</option>
                        </select>
                        <label for="">Gender/Age</label>
                        <select disabled class="custom-input editable" name="for" id="">
                            <option default value="{{ $product->for }}">{{ $product->for }}</option>
                            <option value="Kids">Kids</option>
                            <option value="Men">Men</option>
                            <option value="Women">Women</option>
                        </select>
                        <label for="">Collection</label>
                        <select disabled class="custom-input editable" name="collection" id="">
                            <option value="">None</option>
                            <option default value="{{ $product->collection }}">{{ $product->collection }}</option>
                        </select>
                        <div class="d-flex justify-content-between mt-4">
                            <button class="close-button" id="prev" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete product</button>
                            <input type="submit" class="custom-button  editable" disabled value="Save" style="width: fit-content;margin-left:auto" >
                            
                        </div>
                        
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        const btn = document.querySelector('#edit-btn')

        btn.addEventListener('click',()=>{
            document.querySelectorAll('.editable').forEach(element => {
                element.disabled=false;
            });
        })

        document.querySelector('#prev').addEventListener('click',(e)=>{ 
            e.preventDefault()
        })
    </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
@endsection