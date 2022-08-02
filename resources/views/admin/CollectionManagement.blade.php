@extends('layouts.AdminLayout')

@section('meta')
    <title>Collection Management</title>
    <link rel="stylesheet" href="{{ asset('sass/collectionmanagement.css') }}">
@endsection
@section('main')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a new Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.AddCollection') }}" method="POST" enctype="multipart/form-data"
                    class="d-flex flex-column " id="AddCollectionForm">
                    @csrf
                    <label for="">Name</label>
                    <input type="text" name="name" class="custom-input">
                    <Label>Description</Label>
                    <textarea name="description" id="" class="custom-input"></textarea>
                    <label for="">Image</label>
                    <input type="file" name="image" id="" accept="image/png, image/gif, image/jpeg"
                        class="form-control">
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#AddCollectionForm').submit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit a Collection</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.EditCollection') }}" method="POST" enctype="multipart/form-data"
                    class="d-flex flex-column " id="EditCollectionForm">
                    @csrf
                    <input type="hidden" name="id">
                    <label for="">Name</label>
                    <input type="text" name="name" class="custom-input">
                    <Label>Description</Label>
                    <textarea name="description" id="" class="custom-input"></textarea>
                    <label for="">Image</label>
                    <input type="file" name="image" id="" accept="image/png, image/gif, image/jpeg"
                        class="form-control">
                
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-button me-2" data-bs-dismiss="modal">Close</button>
                <button type="button" class="custom-button"
                    onclick="document.querySelector('#EditCollectionForm').submit()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="nav-bar">
        <h1 class="title">Collection Management</h1>
        <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="custom-button">New Collection</button>
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
        @error('id')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @enderror
    <div class="collections">
       @foreach ($collections as $collection)
       <div class="collection">
        <img src="{{ asset('img/collections/'.$collection->image) }}" alt="">
        <div>
         <h1>{{ $collection->name }}</h1>
         <p>{{ $collection->description }}</p>
         <div class="d-flex" style="gap: 10px">
            <a href="{{ route('admin.CollectionDetails',$collection->id) }}" class="custom-button">Manage</a>
            <button class="custom-button editbtns" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $collection->id }}">Edit Collection</button>
         </div>
         
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
<script>
    let collections = {!! json_encode($collections->toArray(), JSON_HEX_TAG) !!}
    const editbtns = document.querySelectorAll('.editbtns')
    const idField = document.querySelector('#EditCollectionForm>[name="id"]')
    const nameField = document.querySelector('#EditCollectionForm>[name="name"]')
    const descriptionField = document.querySelector('#EditCollectionForm>[name="description"]')
    

    let collection
    editbtns.forEach(element => {
        element.addEventListener('click',()=>{
            let buttonid= element.dataset.id
            collections.forEach((e)=>{
                if(e.id == buttonid){
                    collection = e
                }
            })
            // console.log(collection)
            idField.value=collection.id
            nameField.value=collection.name
            descriptionField.value=collection.description
        })
    });
</script>
@endsection