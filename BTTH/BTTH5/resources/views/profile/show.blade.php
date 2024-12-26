@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5>{{ $user->name }}'s Profile</h5>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" 
                                 alt="Avatar" 
                                 class="img-thumbnail" 
                                 style="width: 150px; height: 150px; border-radius: 50%;">
                        @else
                            <p class="text-muted">No avatar set.</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Bio:</strong> {{ $user->bio }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
