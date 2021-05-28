@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('View Survey Detail') }}
                </div>

                <div class="card-body">
                    @foreach ($options as $option)
                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Survey Header') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        @foreach ($projects as $item)
                                            @if ($item->id == $option->project_id)
                                                {{ $item->heading }}
                                            @endif                                            
                                        @endforeach
                                    </h3>
                                </div>
                            </div>
                        </div>                     

                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        @foreach ($projects as $item)
                                            @if ($item->id == $option->project_id)
                                                {{ $item->name }}
                                            @endif                                            
                                        @endforeach
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        {{$option->description}}                                       
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        {{$option->start}}                                       
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        {{$option->end}}                                       
                                    </h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        {{$option->code}}                                       
                                    </h3>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <div class="detail_value">
                                    <h3>
                                        {{$option->surveylink}}                                       
                                    </h3>
                                </div>
                            </div>
                        </div>

                        @if ($option->culturedim_check == 'on')
                            <div class="row">    
                                <div class="col-md-4"></div>                          
                                <div class="col-md-6">
                                    <div class="detail_value">
                                        <h3>
                                           {{'Culture Dim'}}                                   
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($option->criticalfact_check == 'on')
                            <div class="row">    
                                <div class="col-md-4"></div>                          
                                <div class="col-md-6">
                                    <div class="detail_value">
                                        <h3>
                                           {{'Critical Fact'}}                                   
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($option->balancecard_check == 'on')
                            <div class="row">    
                                <div class="col-md-4"></div>                          
                                <div class="col-md-6">
                                    <div class="detail_value">
                                        <h3>
                                        {{'Balance Score Card'}}                                   
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if ($option->name_check == 'on')
                            <div class="form-group row">    
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>                        
                                <div class="col-md-6">
                                    <input type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                        @endif

                        @if ($option->company_check == 'on')
                            <div class="form-group row">    
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>                         
                                <div class="col-md-6">
                                    <select name="company" id="company" class="form-control">
                                        @foreach(explode(',', $option->company) as $info) 
                                            <option>{{$info}}</option>
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
                                            <option>{{$info}}</option>
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
                                            <option>{{$info}}</option>
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
                                            <option>{{$info}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        
                        @if ($option->companyjob_check == 'on')
                            <div class="form-group row">    
                                <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Company Job') }}</label>                         
                                <div class="col-md-6">
                                    <select name="companyjob" id="companyjob" class="form-control">
                                        @foreach(explode(',', $option->companyjob) as $info) 
                                            <option>{{$info}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif

                        @if ($option->surveydate_check == 'on')
                            <div class="form-group row">    
                                <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>                         
                                <div class="col-md-6">
                                    <input type="date" name="" id="" class="form-control">
                                </div>
                            </div>
                        @endif
                        
                        @php $i = 1; @endphp

                        @foreach ($questions as $item)
                            <div class="form-group row">    
                                <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{ __('Question') }} {{ $i++ }}</label>                         
                                <div class="col-md-6">
                                    <div class="detail_value">
                                        <h3>
                                            {{$item->name}}                                       
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach ($addquesions as $item)
                            <div class="form-group row">    
                                <label for="companylevel" class="col-md-4 col-form-label text-md-right">{{$item->name}}  </label> 
                                <div class="col-md-6">
                                    @if ($item->option_check == 'on')    
                                        <select name="companyjob" id="companyjob" class="form-control">
                                            @foreach(explode(',', $item->option) as $info) 
                                                <option>{{$info}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" name="" id="" class="form-control">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach
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
