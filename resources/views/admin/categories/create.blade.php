@extends('template')
@section('content')
    <div class="container">
        <h1>Create Category</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'admin.categories.store', 'method'=>'POST']) !!}

            @include('admin.categories._form')

            <div class="form-group">
                {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
                <a role="button" href="{{ route('admin.categories.index') }}" class="btn btn-default">Return</a>
             </div>

        {!! Form::close() !!}

    </div>
@endsection