<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src = "{{ asset('logo.png') }}"/>
            </a>
            <div class="ml-auto">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <ul class="navbar-nav">
                    @php
                         $role = auth()->user()->role;
                    @endphp
                    @if ($role == 1)
                        <li class="nav-item ">
                            <a href="#navbar-basic" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">
                                {{ __('Basic Paramenters') }}
                            </a>
                            <div class="collapse show" id="navbar-basic" style="">
                                <ul class="nav nav-sm flex-column">

                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('parameters') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Basic Parameters') }}</span>
                                        </a>  
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewCulture') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Cultures') }}</span>
                                        </a>
                                    </li>
                                
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewModel') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Models') }}</span>
                                        </a>
                                    </li>                               
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewComponent') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Components') }}</span>
                                        </a>
                                    </li>
                                
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewAttribute') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Attributes') }}</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewProject') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Project Types') }}</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewEvalution') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Evalutions') }}</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewModelanalysis') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Analysis Models') }}</span>
                                        </a>
                                    </li>                               

                                </ul>
                            </div>                                           
                        </li>

                        <li class="nav-item ">
                            <a href="#navbar-client" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">
                                {{ __('Clients') }}
                            </a>
                            <div class="collapse" id="navbar-client" style="">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('createClient') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Create Client') }}</span>
                                        </a>  
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewClient') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('View Client') }}</span>
                                        </a>   
                                    </li>
                                    
                                </ul>
                            </div>                                           
                        </li> 
                        
                        <li class="nav-item ">
                            <a href="#navbar-client" class="nav-link" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-multilevel">
                                {{ __('Surveys') }}
                            </a>
                            <div class="collapse" id="navbar-client" style="">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('createSurvey') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('Create Survey') }}</span>
                                        </a>  
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="{{ route('viewSurvey') }}" role="button"  aria-controls="navbar-dashboards">
                                            <i class="ni ni-book-bookmark text-primary"></i>
                                            <span class="nav-link-text">{{ __('View Survey') }}</span>
                                        </a>   
                                    </li>
                                    
                                </ul>
                            </div>                                           
                        </li>
                    @else
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="{{ route('guest') }}" role="button"  aria-controls="navbar-dashboards">
                            <i class="ni ni-book-bookmark text-primary"></i>
                            <span class="nav-link-text">{{ __('View Survey') }}</span>
                        </a> 
                    </li>
                    @endif
                     

                    
                </ul>
            </div>
        </div>
    </div>
</nav>