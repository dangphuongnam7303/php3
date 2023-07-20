@extends('products.layout')
@section('content')
    <div >
    <table class="table" id="example">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quatity</th>
            <th><a href="{{url('/products/create')}}">Add new</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th>{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->quality}}</td>
                <td>
                    <button class="btn btn-danger"
                            onclick="document.getElementById('item-{{ $product->id }}').submit();">Xóa</button>                    <form id="item-{{$product->id}}" style="display: none" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button  class="btn btn-danger"><a href="{{ url('/products/'.$product->id.'/edit') }}">Edit</a></button>

                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection
