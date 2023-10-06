@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                         update  Employee
                        </div>
                            <div class="card-body">
                                <form id="employee-form" method="post" action="{{ route('employees.update', $employee->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
                                    </div>

                                        @error('first_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
                                    </div>

                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    <div class="form-group">
                                        <label for="company_id">Company</label>
                                        <select class="form-control" id="company_id" name="company_id" required>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @error('company_id')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                                    </div>

                                     @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                                    </div>

                                    @error('phone')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                    <button type="submit" class="btn btn-success">Update Employee</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

             </div>
          </main>
    </div>

@endsection
