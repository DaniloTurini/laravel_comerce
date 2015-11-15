@extends('template')

@section('content')
    <h1>Products</h1>

    <a href="{{ route('admin.products.create') }}" class="btn btn-default">New Product</a>
    <br>
    <br>

    <table class="table">
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>

        @foreach( $products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <a href="{{ route('admin.products.edit',['id'=>$product->id]) }}" class="btn btn-default">Edit</a>
                    <a href="{{ route('admin.products.images',['id'=>$product->id]) }}" class="btn btn-default">Images</a>
                    <a href="{{ route('admin.products.destroy',['id'=>$product->id]) }}" class="btn btn-danger">Destroy</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $products->render() !!}

@endsection