@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@endsection

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items">
            <h2 class="title text-center">Tag: {{ $tag->name }}</h2>

            @include('store.partial.product', ['products' => $products])

        </div>
    </div>
@endsection