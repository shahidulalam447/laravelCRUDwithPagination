@extends('layout.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nmae</label>
                            <input type="text" name="name" class="form-control" value="{{old('name',$product->name)}}" />
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4">{{old('description',$product->description)}}</textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{$errors->first('description')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control p-1" />
                            @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-dark btn-sm" >Submit</button>
                    </form>

                    <a href="/" class="btn btn-sm mt-4 btn-dark col-2 ml-auto" >Back to Index</a>
                </div>
            </div>
        </div>
    </div>

@endsection

