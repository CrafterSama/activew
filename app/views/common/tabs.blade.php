<ul class="nav nav-tabs">
    <?php 
    $url = Request::path(); 
    //print_r($url);
    ?>
    <li class=""><a class="carioca_color1" href="/productos">TIPOS DE ESTAMPADOS</a></li>
    <?php $n = 1; ?>
    @foreach ($models as $model)
        <?php $n++;  ?>
        
        <li class=""><a class="carioca_color{{ $n }}" href="/productos/modelos/{{ $model->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($model->id))) }}">{{ strtoupper(ucwords(Modelo::getName($model->id))) }}</a></li>
        {{-- expr --}}
    @endforeach
    <li class="dropdown">
        <a class="other-products" href="#" data-toggle="dropdown">OTROS MODELOS <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
        @foreach ($modelos as $modelo)
             <li @if ($url == 'productos/modelos/{{ $modelo->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($modelo->id))) }}') class="active" @else  @endif><a href="/productos/modelos/{{ $modelo->id }}/{{ Helper::woutSpace(strtolower(Modelo::getName($modelo->id))) }}">{{ strtoupper(ucwords(Modelo::getName($modelo->id))) }}</a></li>
        @endforeach
        </ul>
    </li>
</ul>
