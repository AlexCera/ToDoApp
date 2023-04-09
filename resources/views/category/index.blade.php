@extends('app')

@section('content')

    <div class="container">
        <div class="row mt-3">

            <section class="col-6">
                <div class="border p-4">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }}</h6>
                    @endif

                    @error('name')
                        <h6 class="alert alert-danger">{{ $message }}</h6>
                    @enderror

                    <div class="mb-3">
                        <label for="name" class="form-label">Name </label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="name">
                        <div id="name" class="form-text">Write here the name for the category...</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control" name="color" id="color" aria-describedby="color">
                        <div id="color" class="form-text">Select a color for the category...</div>
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
                        <th>Category</th>
                        <th>*</th>
                    </thead>
                    <tbody>
                        @if (count($categories) > 0)
                            @foreach ($categories as $i => $cat)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td >
                                    {{ $cat->name }}
                                    <span class="badge bg-dark" style="background: {{ $cat->color }}!important;">Color</span>
                                </td>
                                <td>
                                    <a href="{{ route('categories.show', ['category'=>$cat->id]) }}" class="btn btn-sm btn-outline-secondary">Update</a>
                                    &nbsp;
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cat->id}}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$cat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">¿Are you sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            You are going to delete the following category <b>"{{$cat->name}}"</b>.
                                            <br> This action will <b>delete all the tasks</b> that belong to this category.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('categories.destroy', ['category'=>$cat->id]) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Continue</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">There are no categories registered yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </section>

        </div>
    </div>

@endsection()