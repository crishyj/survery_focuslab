@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Culture') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeCulture') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Culture Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Culture Description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> --}}
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="leader" class="col-md-4 col-form-label text-md-right">{{ __('Leader') }}</label>

                            <div class="col-md-6">
                                <input id="leader" type="text" class="form-control @error('leader') is-invalid @enderror" name="leader" value="{{ old('leader') }}" autocomplete="leader" autofocus>

                                @error('leader')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="leader_desc" class="col-md-4 col-form-label text-md-right">{{ __('Leader Description') }}</label>

                            <div class="col-md-6">
                                {{-- <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> --}}
                                <textarea name="leader_desc" id="leader_desc" cols="30" rows="5" class="form-control @error('leader_desc') is-invalid @enderror" autocomplete="leader_desc" autofocus>{{ old('leader_desc') }}</textarea>
                                @error('leader_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
