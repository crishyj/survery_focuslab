@extends('layouts.frontend')

@push('css')

    <style>
        .fas{
            font-size: 20px;
            color: #474754;
        }

        .carousel-control-next, .carousel-control-prev{
            top: unset !important;
        }
    </style>
    
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Survey') }}
                </div>               

                <div class="card-body">
                    <div class="card-body">
                        @foreach ($options as $option)
                            <div class="step1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" class="confirm_form">
                                            @csrf
                                            <div class="text-center mb-5">
                                                <h3>
                                                    POR FAVOR INGRESE EL CÓDIGO
                                                </h3>
                                            </div>
                                            <div class="form-group">
                                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>
        
                                                @error('code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group text-center">
                                                <button class="btn btn-success confirm_codeBtn" id="confirm_codeBtn">Confirm</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                               
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="step2">
                                        <div class="text-center mb-5">
                                            <h3>
                                                Antes de responder el cuestionario de evaluacion de cultura, por favor responda las siguientes preguntas
                                            </h3>
                                        </div>
                                  
                                    
                                        @if ($option->name_check == 'on')
                                            <div class="form-group row">    
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>                         
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" class="form-control name">
                                                    <span class="invalid-name" role="alert">
                                                        <strong>You must input name</strong>
                                                    </span>
                                                </div>
                                                
                                            </div>                                   
                                        @endif
                                        
                                        @if ($option->company_check == 'on')
                                            <div class="form-group row">    
                                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>                         
                                                <div class="col-md-6">
                                                    <select name="company" id="company" class="form-control">
                                                        @foreach(explode(',', $option->company) as $info) 
                                                            <option value="{{$info}}">{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        @endif

                                        @if ($option->city_check == 'on')
                                            <div class="form-group row">    
                                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>                         
                                                <div class="col-md-6">
                                                    <select name="city" id="city" class="form-control">
                                                        @foreach(explode(',', $option->city) as $info) 
                                                            <option value="{{$info}}">{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        @endif
                                        
                                        @if ($option->companyarea_check == 'on')
                                            <div class="form-group row">    
                                                <label for="companyarea" class="col-md-4 col-form-label text-md-right">{{ __('Company Area') }}</label>                         
                                                <div class="col-md-6">
                                                    <select name="companyarea" id="companyarea" class="form-control">
                                                        @foreach(explode(',', $option->companyarea) as $info) 
                                                            <option value="{{$info}}">{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        @endif

                                        @if ($option->companylevel_check == 'on')
                                            <div class="form-group row">    
                                                <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Company Level') }}</label>                         
                                                <div class="col-md-6">
                                                    <select name="companylevel" id="companylevel" class="form-control">
                                                        @foreach(explode(',', $option->companylevel) as $info) 
                                                            <option value="{{$info}}">{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        @endif
                                        
                                        @if ($option->companyjob_check == 'on')
                                            <div class="form-group row">    
                                                <label for="companyjob" class="col-md-4 col-form-label text-md-right">{{ __('Company Job') }}</label>                         
                                                <div class="col-md-6">
                                                    <select name="companyjob" id="companyjob" class="form-control">
                                                        @foreach(explode(',', $option->companyjob) as $info) 
                                                            <option value="{{$info}}">{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        @endif
                                        
                                        @if ($option->surveydate_check == 'on')
                                            <div class="form-group row">    
                                                <label for="companyjob" class="col-md-4 col-form-label text-md-right">{{ __('Survey Date') }}</label>                         
                                                <div class="col-md-6">
                                                    <input type="date" name="survey_date" id="survey_date" class="form-control survey_date">
                                                    <span class="invalid-date" role="alert">
                                                        <strong>You must input date</strong>
                                                    </span>
                                                </div>
                                            </div>                                   
                                        @endif

                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">                                                                                   
                                            <div class="next_step3 btn btn-success">
                                                Next
                                            </div>
                                        </div>                                       
                                    </div>

                                </div>

                                <div class="step3">
                                    <div class="text-center mb-5">
                                        <h3>                                           
                                            @foreach ($projects as $item)
                                                @if ($item->id == $option->project_id)
                                                    {{ $item->heading }}
                                                @endif                                                
                                            @endforeach
                                        </h3>
                                    </div>

                                    
                                    <div id="demo" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <div class="carousel-inner">
                                            @php $i = 1; @endphp
                                        
                                            @foreach ($questions as $item)
                                           
                                            
                                                <div class="carousel-item @if ($i == 1) active @endif">
                                                    <div class="progress-wrapper ">                                               
                                                        <div class="progress">
                                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="{{ceil($i * 100 /count($questions))}}" aria-valuemin="0" aria-valuemax="100" style="width: {{ceil($i * 100 /count($questions))}}%;">{{ceil($i * 100 /count($questions))}}%</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-5">    
                                                        <label for="queanswer" class="col-md-4 col-form-label text-md-right">{{$item->name}}</label>                         
                                                        <div class="col-md-6">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="{{$i}}-1" name="question{{$i}}" class="custom-control-input" data-id="{{$item->id}}" value="1" checked>
                                                                <label class="custom-control-label" for="{{$i}}-1">Casi nunca</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="{{$i}}-2" name="question{{$i}}" class="custom-control-input" value="2" data-id="{{$item->id}}">
                                                                <label class="custom-control-label" for="{{$i}}-2">Algunas veces</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="{{$i}}-3" name="question{{$i}}" class="custom-control-input" value="3" data-id="{{$item->id}}">
                                                                <label class="custom-control-label" for="{{$i}}-3">Casi siempre</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="{{$i}}-4" name="question{{$i}}" class="custom-control-input" value="4" data-id="{{$item->id}}">
                                                                <label class="custom-control-label" for="{{$i}}-4">Siempre</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if ($questions->last()->id == $item->id)
                                                        <div class="form-group row">
                                                            <div class="col-md-12 nav_button">
                                                                                                        
                                                                <div class="next_step4 btn btn-success">
                                                                    Next
                                                                </div>
                                                            </div>                                       
                                                        </div>
                                                    @endif

                                                </div>
                                                @php $i++; @endphp
                                            @endforeach
                                        </div>

                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <i class="fas fa-chevron-circle-left"></i>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <i class="fas fa-chevron-circle-right"></i>
                                        </a>
                                    </div>

                                    <input type="hidden" name="questions" id="questions" value="{{$i}}">
                                    <input type="hidden" name="suranswer_id" class="suranswer_id" id="suranswer_id">

                                </div>
                                
                                <div class="step4">  
                                    <div class="text-center mb-5">
                                        <h3>
                                            Hay algunas pregntas adicionales que deseamos hacerle antes de finalizer esta encuesta. Por favor tómese un par de minutos mas para responderlas.
                                        </h3>
                                    </div>                                  

                                    @php $j = 1; @endphp  
                                    @foreach ($addquesions as $item)
                                        <div class="row form-group add{{$j}}">
                                            <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{$item->name}}</label> 
                                                                
                                            <div class="col-md-6">                                
                                                @if ($item->option_check == 'on')    
                                                    <select name="addanswer{{$j}}" id="addanswer{{$j}}" class="form-control" data-id="{{$item->id}}">
                                                        @foreach(explode(',', $item->option) as $info) 
                                                            <option>{{$info}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <input type="text" name="addanswer{{$j}}" id="addanswer{{$j}}" class="form-control" data-id="{{$item->id}}">
                                                    <span class="invalid-addanswer" role="alert">
                                                        <strong>You must input answer</strong>
                                                    </span>
                                                @endif                               
                                            </div>
                                        </div>
                                        @php $j++; @endphp  
                                    @endforeach
                                    <input type="hidden" name="addquestions" id="addquestions" value="{{$j}}">

                                    <div class="form-group row">
                                        <div class="col-md-12 nav_button">
                                                                                    
                                            <div class="next_step5 btn btn-success">
                                                Next 
                                            </div>
                                        </div>                                       
                                    </div>

                                </div>

                            </form>

                            <div class="step5">
                                <div class="text-center mb-5">
                                    <h3>
                                        GRACIAS POR RESPONDER ESTAS PREGUNTAS.
                                    </h3>
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

            $('#demo').carousel({
                // interval: 1000,
                wrap: false
            });

            $('#demo').on('slid.bs.carousel', '', function() {
                var $this = $(this);

                $this.children('.carousel-control').show();

                if($('.carousel-inner .item:first').hasClass('active')) {
                    $this.children('.left.carousel-control').hide();
                } else if($('.carousel-inner .item:last').hasClass('active')) {
                    $this.children('.right.carousel-control').hide();
                }

            });


            var url = window.location.href; 
            var res = url.split("/", 5);
            var survey_id = res[4];
            let answer_array = [];
            let question_array = [];
            let addquestion_array = [];
            let addqueanswer_array = [];
            var temp1, temp2, temp3, temp4;
            var next = 0;
            var next1 = 0;

            $('#confirm_codeBtn').click(function(e){
                e.preventDefault();
                let _token = $('input[name=_token]').val();
                let code = $('#code').val();
                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("code", code);
                form_data.append("survey_id", survey_id);
                $.ajax({
                    url: "{{ route('checkCode', 'code') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                        if (response == 'success'){        
                            $('.step1').css('display', 'none');                
                            $('.step2').css('display', 'block');
                        }else if(response == 'failed'){
                            alert('The code is invalid');
                            $('.confirm_form').trigger('reset');
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
                    }
                });
            });

            $('.next_step3').click(function(){
                let _token = $('input[name=_token]').val();
                let survey_date = ''
                let name = '';
                if ($( "#name" ).length || $( "#survey_date" ).length) {                   
                    if($('#name').val() == ''){
                        $('.invalid-name').css('display', 'block');
                        return;
                    }else{
                        name = $('#name').val();
                    }

                    if($('#survey_date').val() == ''){
                        $('.invalid-date').css('display', 'block');
                        return;
                    }else{
                        survey_date = $('#survey_date').val();         
                    }        
                }
                
                let company = $('#company').val();
                let city = $('#city').val();
                let company_area = $('#companyarea').val();
                let company_level = $('#companylevel').val();
                let comany_job = $('#companyjob').val();                                 

                var form_data =new FormData();
                form_data.append("_token", _token);               
                form_data.append("survey_id", survey_id);
                form_data.append("name", name);
                form_data.append("company", company);
                form_data.append("city", city);
                form_data.append("company_area", company_area);
                form_data.append("company_level", company_level);
                form_data.append("comany_job", comany_job);
                form_data.append("survey_date", survey_date);
                
                $.ajax({
                    url: "{{ route('suranswer') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                       if(response == 'failed'){
                            alert('The code is invalid');
                            $('.confirm_form').trigger('reset');
                        }else{
                            suranswer_id = response.success;
                            console.log(suranswer_id);
                            $('.suranswer_id').val(suranswer_id);
                            $('.step2').css('display', 'none');
                            $('.step3').css('display', 'block');
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
                    }
                });
            });

            $('.next_step4').click(function(){
                let next = $('#questions').val();
                for(var k = 1; k < next; k++){
                    temp1 = $('input[name="question'+k+'"]:checked').val();   
                    temp2 = $('#'+k+'-1').data("id");
                    answer_array.push(temp1);
                    question_array.push(temp2);                   
                    temp1 = '';
                    temp2 = '';
                }               
                
                let _token = $('input[name=_token]').val();   
                let suranswer_id = $('#suranswer_id').val();             

                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("survey_id", survey_id);
                form_data.append("answers", answer_array);
                form_data.append("questions", question_array);
                form_data.append("suranswer_id", suranswer_id);

                $.ajax({
                    url: "{{ route('queanswer') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                        $('.step3').css('display', 'none');
                        $('.step4').css('display', 'block');                        
                    },
                    error:function (response) {
                        if (response.status == 422) { 
                            $('.error-add').css('display', 'none');
                            $.each(response.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');                                
                                el.after($('<span style="color: red;" class="error-add">'+error[0]+'</span>'));
                                $('.invalid-feedback').css('display', 'block');
                            });
                        }
                    }
                });                
            });
           
            $('.next_step5').click(function(){
                let next1 = $('#addquestions').val();
                for(var k = 1; k < next1; k++){
                    temp3 = $('#addanswer'+k+'').val();
                    if(temp3 == ''){
                        $('.add'+k+' .invalid-addanswer').css('display', 'block');
                        return;
                    }
                    temp4 = $('#addanswer'+k+'').data("id");
                    addqueanswer_array.push(temp3);
                    addquestion_array.push(temp4);                   
                    temp3 = '';
                    temp4 = '';
                }               
                
                let _token = $('input[name=_token]').val();  
                let suranswer_id = $('#suranswer_id').val();

                var form_data =new FormData();
                form_data.append("_token", _token);
                form_data.append("survey_id", survey_id);
                form_data.append("answers", addqueanswer_array);
                form_data.append("questions", addquestion_array);
                form_data.append("suranswer_id", suranswer_id);

                $.ajax({
                    url: "{{ route('addanswer') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response) {
                        console.log(response);
                        $('.step4').css('display', 'none');
                        $('.step5').css('display', 'block');                        
                    },
                    error:function (response) {
                        if (response.status == 422) { 
                            $('.error-add').css('display', 'none');
                            $.each(response.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');                                
                                el.after($('<span style="color: red;" class="error-add">'+error[0]+'</span>'));
                                $('.invalid-feedback').css('display', 'block');
                            });
                        }
                    }
                });
            })
        });
    </script>
    
@endpush
