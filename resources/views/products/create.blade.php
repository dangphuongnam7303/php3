@extends('products.layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{ route('products.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" >
        <div id="name" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="quality" class="form-label">quality</label>
        <input type="number" id="quality" name="quality" class="form-control" >
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">category</label>
        <input type="number" id="category" name="category" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
