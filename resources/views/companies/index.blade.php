@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('companies.create')}}"class="btn btn-success">Create Company</a>
                            </div>
                            <div class="card-body">
                                <h5>  Companies list  </h5>
                                <table class="table table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                @foreach($companies as $company)
                                            <tr>
                                            <td>{{$company->name}}</td>
                                            <td>{{$company->email}}</td>
                                            <td>{{$company->website}}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100" height="100">

                                            </td>
                                            <td>
                                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary m-2">Edit</a>

                                                <form id="delete-company-form-{{ $company->id }}" method="post" action="{{ route('companies.destroy', $company->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="form-group ">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $company->id }}">
                                                            Delete
                                                        </button>
                                                    </div>
                                                <div class="modal fade" id="deleteModal-{{ $company->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this company?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {{ $companies->links() }}

                            </div>
                        </div>
                        </div>
                    </div>

                </div>
        </main>
    </div>
@endsection

