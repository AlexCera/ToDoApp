@extends('app')

@section('content')

    <div class="container">
        <div class="row mt-3">

            <section class="col-6">
                <div class="border p-4">
                <form action="{{ route('task-update', ['id'=>$task->id]) }}" method="POST">
                    @method('PATCH')
                    
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    @error('title')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="title" class="form-label">Task title </label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" value="{{ $task->title }}">
                        <div id="title" class="form-text">Write here the task to be performed...</div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option >Choose a category</option>
                            @foreach ($categories as $cat)                                
                                <option  {{( $task->category_id == $cat->id) ? "selected" : "" }} value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
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