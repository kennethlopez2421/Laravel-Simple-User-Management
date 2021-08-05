@extends('layouts.app')

@section('content')

    <div class="card card-dafault">
        <div class="card-header">
            <h3><strong> {{ isset($user) ? 'Edit User' : 'Create User' }}</strong></h3>

        </div>

        <div class="card-body">
            @include('partials.errors')
            <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="post">
                @csrf

                @if (isset($user))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ isset($user) ? $user->name : '' }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ isset($user) ? $user->email : '' }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ isset($user) ? 'New Password' : 'Password' }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                        autocomplete="new-password">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ isset($user) ? 'Update User' : 'Add User' }}
                    </button>

                </div>
            </form>
        </div>

    </div>


@endsection
