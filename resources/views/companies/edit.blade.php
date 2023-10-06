@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                         Update  Company
                        </div>
                            <div class="card-body">
                                <form id="edit-form" method="post" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" class="form-control" id="website" name="website" value="{{ old('website', $company->website) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                        @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100">
                                @endif
                                    </div>


                                    <button type="submit" class="btn btn-success m-3">Update Company</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

             </div>
          </main>
    </div>

@endsection
