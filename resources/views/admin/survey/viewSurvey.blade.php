@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Survey') }}</div>

                <div class="card-body">

                    <div class="text-right">
                        <a href="{{route('createSurvey')}}">
                            <button class="btn btn-primary">Create Survey</button>
                        </a>                       
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>                                   
                                    <th scope="col">{{ __(' Name') }}</th> 
                                    <th scope="col">{{ __(' Client') }}</th> 
                                    <th scope="col">{{ __(' Project') }}</th> 
                                    <th scope="col">{{ __(' Description') }}</th> 
                                    <th scope="col">{{ __(' Code') }}</th>                   
                                    <th scope="col"></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($options as $option)
                                    <tr>         
                                        <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                        <input type="hidden" name="name" class="name" value="{{$option->name}}" />                                         

                                        <td>{{ $option->name }}</td>

                                        @foreach ($clients as $item)
                                            @if ($item->id == $option->client_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach
                                        
                                        @foreach ($projects as $item)
                                            @if ($item->id == $option->project_id)
                                                <td>{{ $item->name }}</td>
                                            @endif                                            
                                        @endforeach
                                        
                                        <td>{{ $option->description }}</td>                                       
                                        <td>{{ $option->code }}</td>          

                                        
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                    <a href="{{route('surveyDetail', $option->id)}}" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Detail"><i class="ni ni-bullet-list-67"></i> Detail</a>
                                                    <a href="{{route('surveyDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
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
@endpush
