@extends('app')

@section('content')
<div class="container">
        
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://freesvg.org/img/1538154643.png" alt="" width="64" height="64">
        
        <h1 class="display-5 fw-bold">To Do </h1>

        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">This is a simple project to practice and reinforce knowledge about MVC with PHP and the very popular framework Laravel.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button class="btn btn-primary">PHP version {{ PHP_VERSION }}</button>
                <button class="btn btn-secondary">Laravel version {{ Illuminate\Foundation\Application::VERSION }} </button>
            </div>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                <a href="/tasks" class="btn btn-success">Go to main page</a>
            </div>
        </div>

    </div>
    
</div>
@endsection()