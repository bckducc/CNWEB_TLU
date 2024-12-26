@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Dashboard</h5>
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="text-center">
                        <h4>Welcome Back!</h4>
                        <p class="text-muted">You are successfully logged in.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
