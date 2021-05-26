@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create Survey') }}</div>

                <div class="card-body">
                    <form method="POST" action="" class="surveyform">
                        @csrf
                        
                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <div class="badge">{{'Step 1'}}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="client_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Client') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('client_id') is-invalid @enderror" name = 'client_id' id = 'client_id' >
                                    @foreach ($clients as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="project_id" class="col-md-4 col-form-label text-md-right">
                                {{ __('Type of Project') }}
                            </label>

                            <div class="col-md-6">
                                <select class="form-control @error('project_id') is-invalid @enderror" name = 'project_id' id = 'project_id' >
                                    @foreach ($projects as $option)
                                        <option value="{{$option->id}}">{{$option->name}}</option>
                                    @endforeach
                                </select>

                                @error('client_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">
                                {{ __('Description of Survey') }}
                            </label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">
                                {{ __('Start Date') }}
                            </label>

                            <div class="col-md-6">
                                <input id="start" type="date" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}" autocomplete="start" autofocus>
                                @error('start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end" class="col-md-4 col-form-label text-md-right">
                                {{ __('End Date') }}
                            </label>

                            <div class="col-md-6">
                                <input id="end" type="date" class="form-control @error('end') is-invalid @enderror" name="end" value="{{ old('end') }}" autocomplete="end" autofocus>
                                @error('end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-right" for="culturedim_check">Culture Dim</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="culturedim_check" name="culturedim_check" autocomplete="culturedim_check"  autofocus>                                
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-right" for="criticalfact_check">Culture Fact</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="criticalfact_check" name="criticalfact_check" autocomplete="criticalfact_check" autofocus>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="balancecard_check">Balance Score Card</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="balancecard_check" name="balancecard_check" autocomplete="balancecard_check" autofocus>                                
                            </div>
                        </div>    
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="name_check">Name</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="name_check" name="name_check" autocomplete="name_check" autofocus>                                
                            </div>
                        </div>                       
                        

                        <div class="form-group row">
                            <label for="company" class="col-md-4 col-form-label text-md-right">
                                {{ __('Company') }}
                            </label>

                            <div class="input-group col-md-6">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" id="company_check" name="company_check">
                                </div>
                              </div>
                              <input type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" autocomplete="company" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">
                                {{ __('City') }}
                            </label>

                            <div class="input-group col-md-6">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" id="city_check" name="city_check">
                                </div>
                              </div>
                              <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" autocomplete="city" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyarea" class="col-md-4 col-form-label text-md-right">
                                {{ __('Company Area') }}
                            </label>

                            <div class="input-group col-md-6">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" id="companyarea_check" name="companyarea_check">
                                </div>
                              </div>
                              <input type="text" name="companyarea" id="companyarea" class="form-control @error('companyarea') is-invalid @enderror" value="{{ old('companyarea') }}" autocomplete="companyarea" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyarea" class="col-md-4 col-form-label text-md-right">
                                {{ __('Company Level') }}
                            </label>

                            <div class="input-group col-md-6">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" id="companylevel_check" name="companylevel_check">
                                </div>
                              </div>
                              <input type="text" name="companylevel" id="companylevel" class="form-control @error('companylevel') is-invalid @enderror" value="{{ old('companylevel') }}" autocomplete="companylevel" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyarea" class="col-md-4 col-form-label text-md-right">
                                {{ __('Company Job') }}
                            </label>

                            <div class="input-group col-md-6">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" id="companyjob_check" name="companyjob_check">
                                </div>
                              </div>
                              <input type="text" name="companyjob" id="companyjob" class="form-control @error('companyjob') is-invalid @enderror" value="{{ old('companyjob') }}" autocomplete="companyjob" autofocus>
                            </div>
                        </div>                       

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="surveydate_check">Date</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="surveydate_check" name="surveydate_check" autocomplete="surveydate_check" autofocus>                                
                            </div>
                        </div>    

                        
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">
                                {{ __('CODE') }}
                            </label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" autofocus>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 text-md-right">
                                <button type="reset"  class="btn btn-primary">
                                    {{ __('Reset') }}
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-success">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>                        
                    </form>                  

                    <form action="" class="question_form">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <div class="badge">{{'Step 2'}}</div>
                            </div>
                        </div>

                        <input type="hidden" name="survey_id" id="survey_id" class="survey_id">

                        <div id="field">
                            <div id="field0">
                                <div class="form-group row">
                                    <label for="action_id" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Question') }}
                                    </label>

                                    <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" id="question_check0" name="question_check0">
                                        </div>
                                    </div>
                                    <input type="text" name="question0" id="question0" class="form-control input-md question0 @error('question0') is-invalid @enderror" value="{{ old('question0') }}" autocomplete="question0" autofocus>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                       

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-5">
                              <button id="question_submit" name="question_submit" class="btn btn-success">Save</button>
                            </div>
                        </div>                        
                    </form>

                    <form action="" class="additional_form">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 text-md-right">
                                <div class="badge">{{'Step 3'}}</div>
                            </div>
                        </div>

                        <input type="hidden" name="survey_id" id="survey_id1" class="survey_id">

                        <div class="form-group row">
                            <label for="additional_question" class="col-md-4 col-form-label text-md-right">
                                {{ __('Additional Question') }}
                            </label>

                            <div class="col-md-6">
                                <textarea name="name" id="additional_question" rows="5" class="form-control @error('name') is-invalid @enderror" autocomplete="name" autofocus>{{ old('name') }}</textarea>
                                @error('additional_question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-right" for="option_check">Close Question</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="option_check" name="option_check" autocomplete="option_check" autofocus>                                
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="option" class="col-md-4 col-form-label text-md-right">
                                {{ __('Options for Close Questions') }}
                            </label>

                            <div class="col-md-6">
                                <textarea name="option" id="option" rows="5" class="form-control @error('option') is-invalid @enderror" autocomplete="option" autofocus>{{ old('option') }}</textarea>
                                @error('option')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-5">
                              <button id="additional_submit" name="additional_submit" class="btn btn-success">Complete</button>
                            </div>
                        </div>  

                    </form>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

    $(document).ready(function(){
        let questions = [];
        var next = 0;
        var j;
        let question_array = [];
        let check_array = [];
        var temp1, temp2;
        $('.surveyform').submit(function(event)  {
            event.preventDefault();

            let _token = $('input[name=_token]').val();
            let client_id = $('#client_id').val();
            let project_id = $('#project_id').val();
            let description = $('#description').val();
            let start = $('#start').val();
            let end = $('#end').val();
            let culturedim_check = $('#culturedim_check').val();
            let criticalfact_check = $('#criticalfact_check').val();
            let balancecard_check = $('#balancecard_check').val();
            let name = $('#name').val();
            let name_check = $('#name_check').val();
            let company = $('#company').val();
            let company_check = $('#company_check').val();
            let city = $('#city').val();
            let city_check = $('#city_check').val();
            let companyarea = $('#companyarea').val();
            let companyarea_check = $('#companyarea_check').val();
            let companylevel = $('#companylevel').val();
            let companylevel_check = $('#companylevel_check').val();
            let companyjob = $('#companyjob').val();
            let companyjob_check = $('#companyjob_check').val();
            let surveydate = $('#surveydate').val();
            let surveydate_check = $('#surveydate_check').val();
            let code = $('#code').val();

            var form_data =new FormData();
            form_data.append("_token", _token);
            form_data.append("client_id", client_id);
            form_data.append("project_id", project_id);   
            form_data.append("description", description);   
            form_data.append("start", start);
            form_data.append("end", end);
            form_data.append("culturedim_check", culturedim_check);
            form_data.append("criticalfact_check", criticalfact_check); 
            form_data.append("balancecard_check", balancecard_check);
            form_data.append("name", name);
            form_data.append("name_check", name_check);   
            form_data.append("company", company);   
            form_data.append("company_check", company_check);
            form_data.append("city", city);
            form_data.append("city_check", city_check);
            form_data.append("companyarea", companyarea); 
            form_data.append("companyarea_check", companyarea_check);
            form_data.append("companylevel", companylevel);
            form_data.append("companylevel_check", companylevel_check);
            form_data.append("companyjob", companyjob);
            form_data.append("companyjob_check", companyjob_check);
            form_data.append("surveydate", surveydate);
            form_data.append("surveydate_check", surveydate_check);
            form_data.append('code', code);

            $.ajax({
                url: "{{ route('storeSurvey') }}",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response) {
                    console.log(response);
                    $('.surveyform').css('display: none');
                         if (response == 'failed'){
                            $('.invalid-feedback').css('display', 'block');
                        }else{
                            $('.surveyform').css('display', 'none');
                            $('.question_form').css('display', 'block');
                            var i = response.success.length;
                            questions = response.success;
                            $survey_id = response.success[i-1];
                            
                            console.log(questions);

                            $('.survey_id').val($survey_id);
                            $('question0').val(questions[0]);
                            for(j = 0; j < i-1; j++){
                                var addto = "#field" + next;
                                next = next + 1;
                                var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><div class="form-group row"><label for="question'+next+'" class="col-md-4 col-form-label text-md-right">Question'+next+'</label><div class="input-group col-md-6"><div class="input-group-prepend"><div class="input-group-text"><input type="checkbox" id="question_check'+next+'" name="question_check'+next+'"></div></div><input type="text" name="question'+next+'" id="question'+next+'" class="form-control input-md" value="'+questions[j]+'" autocomplete="question'+next+'" autofocus></div></div></div>';
                                var newInput = $(newIn);
                                $(addto).after(newInput);
                                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                            }                           
                        }
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
                        
                    // console.log(response);
                }
            });
        });
      

        $('#question_submit').click(function(e){
            e.preventDefault();

            for(var k = 1; k <= next; k++){
                temp1 = $('#question'+k).val();
                // temp2 = $('#question_check'+k).val();
                if ($('#question_check'+k).prop('checked')==true){ 
                    temp2 = '1'
                }else{
                    temp2 = '0';
                }                
                question_array.push(temp1);
                check_array.push(temp2);
                temp1 = '';
                temp2 = '';
            }
            let _token = $('input[name=_token]').val();
            let survey_id = $('#survey_id').val();

            var form_data =new FormData();
            form_data.append("_token", _token);
            form_data.append("survey_id", survey_id);
            form_data.append("questions", question_array);
            form_data.append("checks", check_array);

            $.ajax({
                url: "{{ route('storeQuestion') }}",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response) {
                    console.log(response);
                    $('.question_form').css('display', 'none');
                    $('.additional_form').css('display', 'block');
                    if (response.success == 'success'){
                        // $('#survey_id1').val(response.data);
                        console.log(response.data);                       
                    }
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

        $('#additional_submit').click(function(e){
            e.preventDefault();

            let _token = $('input[name=_token]').val();
            let survey_id = $('#survey_id').val();
            let name = $('#additional_question').val();
            let option_check = $('#option_check').val();
            let option = $('#option').val();

            var form_data =new FormData();
            form_data.append("_token", _token);
            form_data.append("survey_id", survey_id);
            form_data.append("name", name);
            form_data.append("option_check", option_check);
            form_data.append("option", option);

            $.ajax({
                url: "{{ route('storeAddquestion') }}",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response) {
                    console.log(response);
                    if (response == 'success'){                        
                        window.location.href = '/viewSurvey';
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
    })

</script>
    
@endpush


