@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-3">Categories</h1>
        </div>
        <div class="col-6 text-end">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Add Category
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Family</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        Edit
                                    </button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="alert alert-info m-0">
                        No record found!
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modals')
@endsection

@section('script')
    <script>
        const addRoute = @json(route('api.category.create'));
        const ID = @json(Auth::id());
    </script>

    <script src="{{ asset('template/js/custom.js') }}"></script>
@endsection
