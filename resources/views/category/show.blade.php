@extends('app')

@section('content')

    <div class="container">
        <div class="row mt-3">

            <section class="col-6">
                <div class="border p-4">
                <form action="{{ route('categories.update', ['category'=>$category->id]) }}" method="POST">
                    @method('PATCH')
                    
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    @error('name')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                        <div id="name" class="form-text">Write here the name for the category...</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control" name="color" id="color" value="{{$category->color}}">
                        <div id="color" class="form-text">Select a color for the category...</div>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>

            </section>

        </div>
    </div>

@endsection()