@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('View Survey') }}</div>

                <div class="card-body">

                    <div class="table-responsive py-4">
                        <div class="detail_value">
                            Basic Answers
                        </div>
                        <table class="table align-items-center table-flush text-center"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>    
                                    <th scope="col">{{ __(' ID ') }}</th>                               
                                    <th scope="col">{{ __(' User Name') }}</th>                                     
                                    <th scope="col">{{ __(' Company') }}</th> 
                                    <th scope="col">{{ __(' City') }}</th> 
                                    <th scope="col">{{ __(' Company Area') }}</th>
                                    <th scope="col">{{ __(' Company Level') }}</th>
                                    <th scope="col">{{ __(' Company Job') }}</th>  
                                    <th scope="col">{{ __(' Date') }}</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suranswers as $option)
                                    <tr>
                                        <td>
                                            {{-- {{ Request::segment(2) }}  --}}
                                            {{ $option->id }}
                                         </td>                                               
                                        <td>
                                            @if ($option->user_name != 'undefined')
                                                {{ $option->user_name }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->company != 'undefined')
                                                {{ $option->company }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->city != 'undefined')
                                                {{ $option->city }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->company_area != 'undefined')
                                                {{ $option->company_area }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->company_level != 'undefined')
                                                {{ $option->company_level }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->comany_job != 'undefined')
                                                {{ $option->comany_job }}
                                            @else
                                                
                                            @endif
                                        </td>

                                        <td>
                                            @if ($option->survey_date != 'undefined')
                                                {{ $option->survey_date }}
                                            @else
                                                
                                            @endif
                                        </td>                                                                              
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>

                    <div class="table-responsive py-4">
                        <div class="detail_value">
                            Question and Answers
                        </div>
                        <table class="table align-items-center table-flush text-center"  id="datatable-basic1">
                            <thead class="thead-light">
                                <tr>                             
                                    <th scope="col">{{ __(' Evaluation Name') }}</th>
                                    <th scope="col">{{ __(' Component') }}</th>
                                    <th scope="col">{{ __(' Questions') }}</th>      
                                    <th scope="col">{{ __(' Casi nunca') }}</th> 
                                    <th scope="col">{{ __(' Algunas veces') }}</th> 
                                    <th scope="col">{{ __(' Casi siempre') }}</th>
                                    <th scope="col">{{ __(' Siempre') }}</th>                                                                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $option)
                                    <tr>       
                                        <td>
                                            {{$option->evaluation->name ?? ''}}
                                        </td>
                                        <td>
                                            {{$option->evaluation->component->name ?? ''}}
                                        </td>
                                        <td>
                                           {{$option->name}}
                                        </td>

                                        <td>
                                           {{$option->queanswers()->where('que_answer', 1)->count()}}
                                        </td>
                                        <td>
                                            {{$option->queanswers()->where('que_answer', 2)->count()}}
                                        </td>
                                        <td> 
                                            {{$option->queanswers()->where('que_answer', 3)->count()}}                                           
                                        </td>
                                        <td>
                                            {{$option->queanswers()->where('que_answer', 4)->count()}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>


                    <div class="table-responsive py-4">
                        <div class="detail_value">
                           Additional Question and Answers
                        </div>
                        
                        <table class="table align-items-center table-flush text-center"  id="datatable-basic2">
                            <thead class="thead-light">
                                <tr>    
                                    <th>Answer ID</th>
                                    @foreach ($addquesions as $option)                               
                                        <th scope="col">{{$option->name}}</th>                                     
                                    @endforeach                                                                
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($suranswers as $option)
                                   <tr>
                                        <td>
                                            {{$option->addanswers()->where('survey_id', $option->survey_id)->first()->suranswer_id ?? ''}}
                                        </td>
                                        @foreach ($addquesions as $item)
                                            
                                            <td>
                                                {{$option->addanswers()->where('suranswer_id', $option->id)->where('addquestion_id', $item->id)->first()->addanswer ?? ''}}    
                                            </td>
                                        @endforeach       
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
<script>
    var DatatableBasic = (function() {

        var $dtBasic1 = $('#datatable-basic1');
        var $dtBasic2 = $('#datatable-basic2');
        // var $dtBasic3 = $('#datatable-basic3');
        // var $dtBasic4 = $('#datatable-basic4');
        // var $dtBasic5 = $('#datatable-basic5');
        // var $dtBasic6 = $('#datatable-basic6');
        // var $dtBasic7 = $('#datatable-basic7');

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

        // if ($dtBasic3.length) {
        //     init($dtBasic3);
        // }

        // if ($dtBasic4.length) {
        //     init($dtBasic4);
        // }

        // if ($dtBasic5.length) {
        //     init($dtBasic5);
        // }

        // if ($dtBasic6.length) {
        //     init($dtBasic6);
        // }

        // if ($dtBasic7.length) {
        //     init($dtBasic7);
        // }

    })();
</script>
@endpush
