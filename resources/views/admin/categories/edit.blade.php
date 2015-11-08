@extends('template')
@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($category,['route'=>['admin.categories.update', $category->id], 'method'=>'PUT']) !!}

            @include('admin.categories._form')

            <div class="form-group">
                {!! Form::submit('Save Category', ['class'=>'btn btn-primary']) !!}
                <a role="button" href="{{ route('admin.categories.index') }}" class="btn btn-default">Return</a>
            </div>


        {!! Form::close() !!}

    </div>
@endsection