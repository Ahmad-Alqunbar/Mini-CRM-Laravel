@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Companies
                            </div>
                            <div class="card-body">
                       <a href="{{ route('companies.index') }}"class="btn btn-primary">Companies</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                              Employees
                            </div>
                            <div class="card-body">
                                <a href="{{ route('employees.index') }}"class="btn btn-primary">Employees</a>

                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
@endsection
