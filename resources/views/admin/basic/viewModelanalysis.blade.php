@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('View Anlaysis Model') }}</div>

                <div class="card-body">

                    <div class="text-right">
                        <a href="{{route('createModelanalysis')}}">
                            <button class="btn btn-primary">Create Analaysis Model</button>
                        </a>                       
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light text-center">
                                <tr>                                   
                                    <th scope="col">{{ __(' Name') }}</th> 
                                    <th scope="col">{{ __(' Evaluation ') }}</th> 
                                    <th scope="col">{{ __(' Model Type ') }}</th> 
                                    <th scope="col">{{ __(' Attribute ') }}</th> 
                                    <th scope="col">{{ __(' Culture Type ') }}</th>  
                                    <th scope="col">{{ __(' Answer ') }}</th>                                   
                                    <th scope="col"></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>         
                                        <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                        <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         

                                        <td>{{ $option->name }}</td> 
                                        
                                        @foreach ($evaluations as $item)
                                            @if ($item->id == $option->evaluation_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 

                                        @foreach ($models as $item)
                                            @if ($item->id == $option->model_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 

                                        @foreach ($attributes as $item)
                                            @if ($item->id == $option->attribute_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 

                                        @foreach ($cultures as $item)
                                            @if ($item->id == $option->culture_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 

                                        @foreach ($defanswers as $item)
                                            @if ($item->id == $option->answer)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 
                                        
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">  
                                                    <a href="#" class="dropdown-item  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>                                                      
                                                    <a href="{{route('modelanalysisDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post" id="edit_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Edit Analysis Model')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id1" />

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('Analysis Model Name') }}
                        </label>

                        <div class="col-md-6">
                            <input id="name1" type="text" class="form-control name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <select class="form-control @error('evaluation_id') is-invalid @enderror" name = 'evaluation_id' id = 'evaluation_id1' >
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
                            <select class="form-control @error('model_id') is-invalid @enderror" name = 'model_id' id = 'model_id1' >
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
                            <select class="form-control @error('attribute_id') is-invalid @enderror" name = 'attribute_id' id = 'attribute_id1' >
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
                            <select class="form-control @error('culture_id') is-invalid @enderror" name = 'culture_id' id = 'culture_id1' >
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
                            <select class="form-control @error('answer') is-invalid @enderror" name = 'answer' id = 'answer1' >
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
                                
                </div>              
                
                <div class="modal-footer">    
                    <button type="button" class="btn btn-primary btn-submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;{{ __('Save')}}</button>                       
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;{{ __('Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    
@endpush

@push('js')
<script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>


<script>
    $(document).ready(function(){
        $(document).on('click', '.modal-btn2', function (){
            let id = $(this).data('id');
            let name = $(this).parents('tr').find('.name').val().trim();             

            $("#edit_form .id").val(id);
            $("#edit_form .name").val(name);                                   
            $("#editModal").modal();
        });

        $("#edit_form").submit(function(e){
            e.preventDefault();
        });

        $("#edit_form .btn-submit").click(function(){
            let _token = $('input[name=_token]').val();
            let id = $('#id1').val();          
            let name = $('#name1').val();
            let evaluation_id = $('#evaluation_id1').val();
            let model_id = $('#model_id1').val();
            let attribute_id = $('#attribute_id1').val();
            let culture_id = $('#culture_id1').val();
            let answer = $('#answer1').val();
          
            var form_data =new FormData();        
            form_data.append("_token", _token);            
            form_data.append("id", id);
            form_data.append("name", name);
            form_data.append("evaluation_id", evaluation_id);
            form_data.append("model_id", model_id);
            form_data.append("attribute_id", attribute_id);
            form_data.append("culture_id", culture_id);
            form_data.append("answer", answer);           
           
            $.ajax({
                url: "{{route('updateModelanalysis')}}",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success : function(response) {
                    if(response == 'success') {  
                        window.location.reload();                          
                    } else {
                        let messages = response.data;
                        console.log(messages);
                    }
                },
                error: function(response) {
                    $("#ajax-loading").fadeOut();
                    if(response.responseJSON.message == 'The given data was invalid.'){                            
                        let messages = response.responseJSON.errors;
                        if(messages.option) {
                        }
                        alert("Something went wrong");
                        window.location.reload();        
                    } else {
                        alert("Something went wrong");
                    }
                }
            });
        });
    });
</script>

@endpush
