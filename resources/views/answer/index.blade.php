@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Login') }}
                </div>
               

                <div class="card-body">
                    <div class="card-body">
                        @foreach ($options as $option)
                            <div class="step1">
                                <form action="" class="confirm_form">
                                    @csrf
                                    <div class="form-group px-5">
                                        <label for="code">Please input the validation code.</label>
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>

                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary confirm_btn" id="confirm_btn">Confirm</button>
                                    </div>
                                </form>
                            </div>
                           

                            <div class="step2">

                                @php $i = 1; @endphp
    
                                @foreach ($questions as $item)
                                    <div class="form-group row">    
                                        <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Question') }} {{ $i++ }}</label>                         
                                        <div class="col-md-6">
                                            <div class="detail_value">
                                                <h5>
                                                    {{$item->name}}                                       
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
        
                               
                                <div class="form-group row">    
                                    <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Additional Question') }}</label> 
                                                        
                                    <div class="col-md-6">
                                        @foreach ($addquesions as $item)
                                            @if ($item->option_check == 'on')    
                                                <select name="companyjob" id="companyjob" class="form-control">
                                                    @foreach(explode(',', $item->option) as $info) 
                                                        <option>{{$info}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <div class="detail_value">
                                                    <h5>
                                                        {{$item->name}}                                       
                                                    </h5>
                                                </div>  
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>
    
                                <div class="col-md-6">
                                    <div class="detail_value">
                                        <h5>
                                            {{$option->code}}                                       
                                        </h5>
                                    </div>
                                </div>
                            </div>
                           
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function(){
            $('#confirm_btn').click(function(e){
                e.preventDefault();

                let _token = $('input[name=_token]').val();
                let code = $('#code').val();

                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("code", code);
                
                $.ajax({
                    url: "{{ route('checkCode', "+code+") }}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                        if (response == 'success'){                        
                            
                        }
                    },
                    error:function (response) {
                        if (response.status == 422) { 
                            $.each(response.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');                                
                                el.after($('<span style="color: red;" class="error-add">'+error[0]+'</span>'));
                                $('.invalid-feedback').css('display', 'block');
                            });
                        }
                            
                        // console.log(response);
                    }
                });

            });
        });
    </script>
    
@endpush
