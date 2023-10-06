@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{route('employees.create')}}"class="btn btn-success">Create Employee</a>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <h5>  Employees list  </h5>
                                </div>
                                <table class="table table">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->first_name }}</td>
                                            <td>{{ $employee->last_name }}</td>
                                            <td>{{ $employee->company->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            <td>
                                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary m-2">Edit</a>
                                                <form id="delete-employee-{{ $employee->id }}" method="post" action="{{ route('employees.destroy', $employee->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $employee->id }}">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $employees->links() }}
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
        </main>
    </div>
        @foreach ($employees as $employee)
        <div class="modal fade" id="deleteModal-{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this employee?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" form="delete-employee-{{ $employee->id }}" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
@endsection
