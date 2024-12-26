@extends('layouts.app')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input 
                                id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name', $user->name) }}" 
                                required 
                                autocomplete="name" 
                                autofocus
                            >
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ old('email', $user->email) }}" 
                                required 
                                autocomplete="email"
                            >
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea 
                                id="bio" 
                                class="form-control @error('bio') is-invalid @enderror" 
                                name="bio"
                                rows="3"
                            >{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input 
                                id="avatar" 
                                type="file" 
                                class="form-control @error('avatar') is-invalid @enderror" 
                                name="avatar"
                            >
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @if ($user->avatar)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="img-thumbnail" style="width: 100px; height: 100px;">
                                </div>
                            @endif
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
