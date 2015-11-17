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
            <div class="form-group">
                {!! Form::label('category', 'Category:') !!}
                {!! Form::select('category_id', $categories, $product->category->id, ['class'=>'form-control']) !!}
            </div>

            @include('admin.products._form')

            <div class="form-group">
               {!! Form::label('tags', 'Tags:') !!}
               {!! Form::textarea('tags', $product->tagList, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save Product', ['class'=>'btn btn-primary']) !!}
                <a role="button" href="{{ route('admin.products.index') }}" class="btn btn-default">Return</a>
            </div>

        {!! Form::close() !!}

    </div>
@endsection