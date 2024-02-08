@extends('layout.app')
@section('main')

    <div class="container">
        <div>
            <a href="products/create" class="btn btn-dark mt-2">Add New Product</a>
        </div>
        <h1 class="row justify-content-center p-2">Product List</h1>
        <table class="table table-hover mt-2">
            <thead>
              <tr>
                <th>Sl No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>
                        <a href="products/{{$product->id}}/show" class="text-dark">{{$product->name}}</a>
                    </td>
                    <td>{{$product-> description}}</td>
                    <td>
                        <img src="products/{{ $product->image }}" alt="image" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>
                        <a href="products/{{$product->id}}/edit" class="btn btn-sm btn-primary">Edit</a>

                        {{-- For Delete --}}
                        {{-- <a href="products/{{$product->id}}/delete" class="btn btn-sm btn-danger">Delete</a> --}}
                        <form method="POST" class="d-inline" action="products/{{$product->id}}/delete">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$products->links()}}
    </div>

@endsection
