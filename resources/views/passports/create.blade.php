@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Passport') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('passport:store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Client Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="callback">{{ __('Client Callback') }}</label>
                            <input id="callback" type="text" class="form-control @error('callback') is-invalid @enderror" 
                                name="callback" value="{{ old('callback') }}" required autocomplete="callback" autofocus>

                            @error('callback')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Create Passport') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
