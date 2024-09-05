<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                              

                @if (env('APP_ENV') != 'local')
                    @foreach (Auth::user()->rol->menu() as $pantalla_menu)  
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                
                                <span>{{$pantalla_menu->nombre_pantalla}}</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @if ($pantalla_menu->url_pantalla != "#")
                                    @if ($pantalla_menu->nombre_pantalla=='Orden de Laboratorio')

                                        <li><a href="{{$pantalla_menu->url_pantalla}}">Lista de Ordenes</a></li>
                                        
                                    @else

                                        <li><a href="{{$pantalla_menu->url_pantalla}}">Lista de {{$pantalla_menu->nombre_pantalla}}</a></li>

                                    @endif
                                
                                @endif
                                @foreach($pantalla_menu->sub_menu() as $sub_menu)
                                    @if($pantalla_menu->id == $sub_menu->padre and $sub_menu->estado_pantalla==1 )   
                                        <li><a href="{{$sub_menu->url_pantalla}}">{{$sub_menu->nombre_pantalla}}</a></li>                        
                                    @endif
                                @endforeach
                            </ul>
                        </li>  
                    @endforeach
                @endif              
                    
                             

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>