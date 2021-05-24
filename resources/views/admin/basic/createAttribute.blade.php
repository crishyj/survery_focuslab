@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Attribute') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeAttribute') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="model_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Model Types') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('model_id') is-invalid @enderror" name = 'model_id' id = 'model_id' >
                                    @foreach ($models as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('model_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Attribute Name') }}
                            </label>

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
                            <label for="order" class="col-md-4 col-form-label text-md-right">
                                {{ __('Order') }}
                            </label>

                            <div class="col-md-6">
                                <input id="order" type="text" class="form-control @error('order') is-invalid @enderror" name="order" value="{{ old('order') }}" autocomplete="order" autofocus>

                                @error('order')
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
