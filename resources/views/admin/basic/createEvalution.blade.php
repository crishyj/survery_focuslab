@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Evalution') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeEvalution') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="component_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Select Components') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('component_id') is-invalid @enderror" name = 'component_id' id = 'component_id' >
                                    @foreach ($components as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('component_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Evalution Name') }}
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
                            <label for="fquestion" class="col-md-4 col-form-label text-md-right">{{ __('PREGUNTA EN PRIMERA PERSONA') }}</label>

                            <div class="col-md-6">
                                <textarea name="fquestion" id="fquestion" rows="5" class="form-control @error('fquestion') is-invalid @enderror" autocomplete="fquestion" autofocus>{{ old('fquestion') }}</textarea>
                                @error('fquestion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="squestion" class="col-md-4 col-form-label text-md-right">{{ __('PREGUNTA EN TERCERA PERSONA') }}</label>

                            <div class="col-md-6">
                                <textarea name="squestion" id="squestion" rows="5" class="form-control @error('squestion') is-invalid @enderror" autocomplete="squestion" autofocus>{{ old('squestion') }}</textarea>
                                @error('squestion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tquestion" class="col-md-4 col-form-label text-md-right">{{ __('PREGUNTA ORGANIZACION') }}</label>

                            <div class="col-md-6">
                                <textarea name="tquestion" id="tquestion" rows="5" class="form-control @error('tquestion') is-invalid @enderror" autocomplete="tquestion" autofocus>{{ old('tquestion') }}</textarea>
                                @error('tquestion')
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
