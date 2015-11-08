@extends('template')
@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'admin.products.store', 'method'=>'POST']) !!}

        @include('admin.products._form')

        <div class="form-group">
            {!! Form::submit('Add Product', ['class'=>'btn btn-primary']) !!}
            <a role="button" href="{{ route('admin.products.index') }}" class="btn btn-default">Return</a>
        </div>

        {!! Form::close() !!}

    </div>
@endsection