@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                         New  Company
                        </div>
                            <div class="card-body">
                                <form id="company-form" method="post" action="{{ route('companies.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                            @error('name')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                            @error('email')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website">
                                    </div>

                                    @error('website')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>

                                    @error('logo')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <button type="submit" class="btn btn-success m-3">Add Company</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             </div>
          </main>
    </div>

@endsection
