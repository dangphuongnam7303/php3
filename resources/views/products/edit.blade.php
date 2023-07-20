@extends('products.layout')
@section('content')
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" >
            <div id="name" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="quality" class="form-label">quality</label>
            <input type="number" id="quality" name="quality" value="{{$product->quality}}" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">category</label>
            <input type="number" id="category" name="category" value="{{$product->category}}" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
