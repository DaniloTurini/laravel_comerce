@extends('template')
@section('content')
    <div class="container">
        <h1>Edit Product</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($product,['route'=>['admin.products.update', $product->id], 'method'=>'PUT']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection