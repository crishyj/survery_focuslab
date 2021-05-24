@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Basic Parameters') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Cultures</label>
                            <div class="table-responsive py-4">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Culture Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cultures as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
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
                        <div class="col-md-6">
                            <label for="">Attributes</label>
                            <div class="table-responsive py-4">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic1">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Attribute Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attributes as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                            <a href="{{route('attributeDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive py-4">
                                <label for="">Components</label>
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic2">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Component Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($components as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                            <a href="{{route('componentDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="table-responsive py-4">
                                <label for="">Evaluations</label>
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic3">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Evaluation Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evaluations as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
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
                        
                        <div class="col-md-6">
                            <div class="table-responsive py-4">
                                <label for="">Models</label>
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic5">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Model Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($modelnews as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                            <a href="{{route('modelDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        
                        <div class="col-md-6">
                            <div class="table-responsive py-4">
                                <label for="">ANALYSIS MODEL</label>
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic6">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('ANALYSIS MODEL Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($analysismodels as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
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


                        
                        <div class="col-md-6">
                            <div class="table-responsive py-4">
                                <label for="">Projects</label>
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic7">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __('Project Name') }}</th>                                   
                                            <th scope="col"></th>                                  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($projects as $option)
                                            <tr>         
                                                <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                                <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         
        
                                                <td>{{ $option->name }}</td>          
                                                
                                                <td class="text-right">
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                            <a href="{{route('projectDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
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
    var DatatableBasic = (function() {

        var $dtBasic1 = $('#datatable-basic1');
        var $dtBasic2 = $('#datatable-basic2');
        var $dtBasic3 = $('#datatable-basic3');
        var $dtBasic4 = $('#datatable-basic4');
        var $dtBasic5 = $('#datatable-basic5');
        var $dtBasic6 = $('#datatable-basic6');
        var $dtBasic7 = $('#datatable-basic7');

        function init($this) {

            var options = {
                keys: !0,
                select: {
                    style: "multi"
                },
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
            };

            var table = $this.on( 'init.dt', function () {
                $('div.dataTables_length select').removeClass('custom-select custom-select-sm');

            }).DataTable(options);
        }

        if ($dtBasic1.length) {
            init($dtBasic1);
        }

        if ($dtBasic2.length) {
            init($dtBasic2);
        }

        if ($dtBasic3.length) {
            init($dtBasic3);
        }

        if ($dtBasic4.length) {
            init($dtBasic4);
        }

        if ($dtBasic5.length) {
            init($dtBasic5);
        }

        if ($dtBasic6.length) {
            init($dtBasic6);
        }

        if ($dtBasic7.length) {
            init($dtBasic7);
        }

})();
</script>
@endpush
