@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Categories</h1>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" onclick="clearAddModal()" data-bs-target="#addModal">
                Add Category
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="alert"></div>
                    <div id="response"></div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals')
@endsection

@section('script')
    <script>
        const ID = @json(Auth::id());
        const showAllRoute = @json(route('api.category', Auth::id()));
        const addRoute = @json(route('api.category.create'));
        const showSingleRoute = @json(route('api.category.show', ':id'));
        const editRoute = @json(route('api.category.edit', ':id'));
        const deleteRoute = @json(route('api.category.destroy', ':id'));
    </script>

    <script src="{{ asset('template/js/custom.js') }}"></script>
@endsection
