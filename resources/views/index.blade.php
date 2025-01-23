@extends('layouts.app')
@section('meta')
    <meta name="theme-color" content="#712cf9">
    <meta name="url-base" content="{{ url('') }}">
@endsection

@section('styles')
    <style>
        .alert {
            display: none;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection



<!-- modal -->
@include('modal')

<!-- page content -->
@section('content')
    <div class="container">
        <h1 class="mt-5">Product</h1>
        <p class="lead">
            Tercera versión de la misma aplicación de productos: fetch (ajax).
        </p>
        <div class="alert alert-success" role="alert" id="productSuccess">Successfully done.</div>
        <div class="alert alert-danger" role="alert" id="productError">Error doing.</div>
        <!-- dynamic content -->
        <div id="content"></div>
        <div>
            <!--dynamic pagination content -->
            <ul class="pagination mt-4 " id="pagination"></ul>
        </div>
    </div>
@endsection

@section('footer')
    <div class="container">
        <span class="text-body-secondary">Place sticky footer content here.</span>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ url('/js/script.js') }}" type="module"></script>
@endsection
