@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Evalution') }}</div>

                <div class="card-body">

                    <div class="text-right">
                        <a href="{{route('createEvalution')}}">
                            <button class="btn btn-primary">Create Evaluation</button>
                        </a>                       
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>                                   
                                    <th scope="col">{{ __(' Name') }}</th> 
                                    <th scope="col">{{ __(' Compoenent') }}</th> 
                                    <th scope="col">{{ __(' PREGUNTA EN PRIMERA PERSONA') }}</th>                                   
                                    <th scope="col">{{ __(' PREGUNTA EN TERCERA PERSONA ') }}</th> 
                                    <th scope="col">{{ __(' PREGUNTA ORGANIZACION ') }}</th> 
                                    <th scope="col"></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>         
                                        <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                        <input type="hidden" name="name" class="name" value="{{$option->name}}" /> 
                                        <input type="hidden" name="fquestion" class="fquestion" value="{{$option->fquestion}}" /> 
                                        <input type="hidden" name="squestion" class="squestion" value="{{$option->squestion}}" /> 
                                        <input type="hidden" name="tquestion" class="tquestion" value="{{$option->tquestion}}" />                                         

                                        <td>{{ $option->name }}</td>
                                        @foreach ($components as $item)
                                            @if ($item->id == $option->component_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach 
                                        <td>{{ $option->fquestion }}</td>
                                        <td>{{ $option->squestion }}</td>
                                        <td>{{ $option->tquestion }}</td>          

                                        
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a href="#" class="dropdown-item  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>
                                                    <a href="{{route('evalutionDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
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
                    <h4 class="modal-title">{{ __('Edit Component')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id1" />

                    <div class="form-group row">
                        <label for="component_id" class="col-md-4 col-form-label text-md-right">
                            {{ __('Select Components') }}
                        </label>

                        <div class="col-md-6">
                            <select id = 'component_id' class="form-control @error('component_id') is-invalid @enderror" name = 'component_id' >
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
                            <input id="name1" type="text" class="form-control name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                            <textarea name="fquestion" id="fquestion1" rows="5" class="form-control fquestion @error('fquestion') is-invalid @enderror" autocomplete="fquestion" autofocus>{{ old('fquestion') }}</textarea>
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
                            <textarea name="squestion" id="squestion1" rows="5" class="form-control squestion @error('squestion') is-invalid @enderror" autocomplete="squestion" autofocus>{{ old('squestion') }}</textarea>
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
                            <textarea name="tquestion" id="tquestion1" rows="5" class="form-control tquestion @error('tquestion') is-invalid @enderror" autocomplete="tquestion" autofocus>{{ old('tquestion') }}</textarea>
                            @error('tquestion')
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
            let fquestion = $(this).parents('tr').find('.fquestion').val().trim();
            let squestion = $(this).parents('tr').find('.squestion').val().trim();
            let tquestion = $(this).parents('tr').find('.tquestion').val().trim();

            $("#edit_form .id").val(id);
            $("#edit_form .name").val(name);
            $("#edit_form .fquestion").val(fquestion);
            $("#edit_form .squestion").val(squestion);
            $("#edit_form .tquestion").val(tquestion);                          
            $("#editModal").modal();
        });

        $("#edit_form").submit(function(e){
            e.preventDefault();
        });

        $("#edit_form .btn-submit").click(function(){
            let _token = $('input[name=_token]').val();
            let id = $('#id1').val();          
            let name = $('#name1').val();
            let component_id = $('#component_id').val();
            let fquestion = $('#fquestion1').val();
            let squestion = $('#squestion1').val();
            let tquestion = $('#tquestion1').val();
          
            var form_data =new FormData();        
            form_data.append("_token", _token);            
            form_data.append("id", id);
            form_data.append("name", name);
            form_data.append("component_id", component_id);
            form_data.append("fquestion", fquestion);
            form_data.append("squestion", squestion);
            form_data.append("tquestion", tquestion);
           
           
            $.ajax({
                url: "{{route('updateEvalution')}}",
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
