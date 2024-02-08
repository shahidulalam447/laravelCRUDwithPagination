@extends('layout.app')
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm--8 mt-4">
            <div class="card p-4">
                <p><strong>Name : </strong>{{$product->name}}</p>
                <p><strong>Description : </strong>{{$product->description}}</p>
                <img src="/products/{{$product->image}}" class="rounded" width="200px" height="200px" alt="image">
            </div>
            <a href="/" class="btn btn-sm mt-4 btn-dark" >Back to Index</a>
        </div>
    </div>
</div>


@endsection
