<ul class="nav nav-tabs">
    <?php 
    $url = Request::path(); 
    //print_r($url);
    ?>
    <li @if ($url == 'productos') class="carioca_color1" @else  @endif><a href="/productos">Tipos de Estampados</a></li>
    @foreach ($models as $model)
        <?php 
        if (Modelo::getName($model->id) == 'short') {
            $carioca_color = 'carioca_color2';
        }
        elseif (Modelo::getName($model->id) == 'niña') {
            $carioca_color = 'carioca_color3';
        }
        elseif (Modelo::getName($model->id) == 'capri') {
            $carioca_color = 'carioca_color4';
        }
        elseif (Modelo::getName($model->id) == 'largo') {
            $carioca_color = 'carioca_color5';
        }
        ?>
        <li @if ($url == 'productos/modelos/{{ $model->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($model->id))) }}') class="{{ $carioca_color }}" @else  @endif><a href="/productos/modelos/{{ $model->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($model->id))) }}">{{ ucwords(Modelo::getName($model->id)) }}</a></li>
        {{-- expr --}}
    @endforeach
    <li class="dropdown">
        <a href="#" data-toggle="dropdown">Otros Modelos <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        @foreach ($modelos as $modelo)
             <li @if ($url == 'productos/modelos/{{ $modelo->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($modelo->id))) }}') class="active" @else  @endif><a href="/productos/modelos/{{ $modelo->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($modelo->id))) }}">{{ ucwords(Modelo::getName($modelo->id)) }}</a></li>
        @endforeach
        </ul>
    </li>
</ul>
