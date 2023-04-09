@extends('app')

@section('content')

    <div class="container">
        <div class="row mt-3">

            <section class="col-6">
                <div class="border p-4">
                <form action="{{ route('task-save') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    @error('title')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="title" class="form-label">Task title </label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title">
                        <div id="title" class="form-text">Write here the task to be performed...</div>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option selected>Choose a category</option>
                            @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>

            </section>

            <section class="col-6">
                <table class="table table-sm">
                    <thead>
                        <th>No.</th>
                        <th>Task</th>
                        <th>*</th>
                    </thead>
                    <tbody>
                        @if (count($tasks) > 0)                            
                            @foreach ($tasks as $i => $t)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $t->title }}</td>
                                <td>
                                    <a href="{{ route('task-show', ['id'=>$t->id]) }}" class="btn btn-sm btn-outline-secondary">Update</a>
                                    &nbsp;
                                    <form action="{{ route('task-delete', ['id'=>$t->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr >
                                <td colspan="3" class="text-center">There's no tasks yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </section>

        </div>
    </div>

@endsection()