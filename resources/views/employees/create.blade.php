@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                         New  Employee
                        </div>
                            <div class="card-body">
                                <form id="employee-form" method="post" action="{{ route('employees.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" required>

                                    </div>
                                    @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                                    </div>
                                    @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                     <div class="form-group mt-2 mb-2">
                                        <label for="company_id">Company</label>
                                        <select class="form-control" id="company_id" name="company_id">
                                            <option value="">Select a company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                      @error('company_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    @error('email')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                    <div class="form-group">
                                        <label for="Phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    @error('phone')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                    <button type="submit" class="btn btn-success m-3">Add employee</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             </div>
          </main>
    </div>

@endsection
