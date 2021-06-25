@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('View Cultures') }}</div>

                <div class="card-body">

                    <div class="text-right">
                        <a href="{{route('createCulture')}}">
                            <button class="btn btn-primary">Create Culture</button>
                        </a>                       
                    </div>
                    
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light text-center">
                                <tr>                                   
                                    <th scope="col">{{ __(' Name') }}</th>
                                    <th scope="col">{{ __(' Description') }}</th>   
                                    <th scope="col">{{ __(' Leader') }}</th>   
                                    <th scope="col">{{ __(' Leader Description') }}</th>                                      
                                    <th scope="col"></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cultures as $option)
                                    <tr>         
                                        <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                        <input type="hidden" name="name" class="name" value="{{$option->name}}" />
                                        <input type="hidden" name="description" class="description" value="{{$option->description}}" />
                                        <input type="hidden" name="leader" class="leader" value="{{$option->leader}}" />
                                        <input type="hidden" name="leader_desc" class="leader_desc" value="{{$option->leader_desc}}" />

                                        <td>{{ $option->name }}</td>
                                        <td>{{ $option->description }}</td>
                                        <td>{{ $option->leader }}</td>
                                        <td>{{ $option->leader_desc }}</td>          
                                        
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">  
                                                    <a href="#" class="dropdown-item  modal-btn2" data-id="{{$option->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-modal="modal-1"><i class="fas fa-edit"></i>Edit</a>
                                                    <a href="{{route('cultureDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
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
                    <h4 class="modal-title">{{ __('Edit Culture')}}</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id" id ="id1" />
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Culture Name') }}</label>

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
                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Culture Description') }}</label>

                        <div class="col-md-6">
                            <textarea name="description" id="description1" cols="30" rows="5" class="form-control description @error('description') is-invalid @enderror" autocomplete="description" autofocus>{{ old('description') }}</textarea>
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
                            <input id="leader1" type="text" class="form-control leader @error('leader') is-invalid @enderror" name="leader" value="{{ old('leader') }}" autocomplete="leader" autofocus>

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
                            <textarea name="leader_desc" id="leader_desc1" cols="30" rows="5" class="form-control leader_desc @error('leader_desc') is-invalid @enderror" autocomplete="leader_desc" autofocus>{{ old('leader_desc') }}</textarea>
                            @error('leader_desc')
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
            let description = $(this).parents('tr').find('.description').val().trim();     
            let leader = $(this).parents('tr').find('.leader').val().trim();     
            let leader_desc = $(this).parents('tr').find('.leader_desc').val().trim();     

            $("#edit_form .id").val(id);
            $("#edit_form .name").val(name);
            $("#edit_form .description").val(description);
            $("#edit_form .leader").val(leader);
            $("#edit_form .leader_desc").val(leader_desc);            
            $("#editModal").modal();
        });

        $("#edit_form").submit(function(e){
            e.preventDefault();
        });

        $("#edit_form .btn-submit").click(function(){
            let _token = $('input[name=_token]').val();
            let id = $('#id1').val();
            let name = $('#name1').val();
            let description = $('#description1').val();
            let leader = $('#leader1').val();
            let leader_desc = $('#leader_desc1').val();          

            var form_data =new FormData();
        
            form_data.append("_token", _token);
            form_data.append("id", id);
            form_data.append("name", name);
            form_data.append("description", description);
            form_data.append("leader", leader);
            form_data.append("leader_desc", leader_desc);        
            $.ajax({
                url: "{{route('updateCulture')}}",
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
                            // $('#edit_form .option_error strong').text(messages.option[0]);
                            // $('#edit_form .option_error').show();
                            // $('#edit_form .option').focus();
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
