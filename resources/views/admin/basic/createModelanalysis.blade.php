@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Analysis Model') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeModelanalysis') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Analysis Model Name') }}
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="evaluation_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Evaluation Items') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('evaluation_id') is-invalid @enderror" name = 'evaluation_id' id = 'evaluation_id' >
                                    @foreach ($evaluations as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('evaluation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

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
                            <label for="attribute_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Attribute') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('attribute_id') is-invalid @enderror" name = 'attribute_id' id = 'attribute_id' >
                                    @foreach ($attributes as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('attribute_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="culture_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Culture Type') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('culture_id') is-invalid @enderror" name = 'culture_id' id = 'culture_id' >
                                    @foreach ($cultures as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('culture_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="answer" class="col-md-4 col-form-label text-md-right">
                                {{ __('Answer') }}
                            </label>
                            

                            <div class="col-md-6">
                                <select class="form-control @error('answer') is-invalid @enderror" name = 'answer' id = 'answer' >
                                    @foreach ($defanswers as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('answer')
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
