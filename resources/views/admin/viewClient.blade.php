@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('View Client') }}</div>

                <div class="card-body">
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-basic">
                            <thead class="thead-light text-center">
                                <tr>                                   
                                    <th scope="col">{{ __(' Name') }}</th>
                                    <th scope="col">{{ __(' Email') }}</th>
                                    <th scope="col">{{ __(' Password') }}</th>
                                    <th scope="col">{{ __(' Nit') }}</th>   
                                    <th scope="col"></th>                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $option)
                                    <tr>         
                                        <input type="hidden" name="id" class="id" value="{{$option->id}}" />  
                                        <input type="hidden" name="name" class="name" value="{{$option->name}}" />  
                                        <input type="hidden" name="email" class="email" value="{{$option->email}}" />  
                                        <input type="hidden" name="oringpass" class="oringpass" value="{{$option->publicpassword}}" />  
                                        <input type="hidden" name="nit" class="nit" value="{{$option->nit}}" />                                     

                                        <td>{{ $option->name }}</td>
                                        <td>{{ $option->email }}</td>
                                        <td>{{ $option->publicpassword }}</td>
                                        <td>{{ $option->nit }}</td>
                                        
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">                                                        
                                                    <a href="{{route('clientDelete', $option->id)}}" onclick="return window.confirm('Are you sure?')" class="dropdown-item" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i> Delete</a>
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
