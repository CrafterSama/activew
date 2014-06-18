@extends('layouts.home')

@section('content')
<div class="main">
    <div class="container">
        <div class="row">
            	<br />
	    	@if(Session::has('notice'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('notice') }}
		</div>
		@endif
	    	<br />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-info btn-md" onclick="history.go(-1)">
                        <i class="fa fa-chevron-left"></i> Volver
                    </button>
                    <h3 class="panel-title visible-lg pull-right">Perfil del Producto</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-5">
                        <figure class="img-thumbnail">
                            <img src="/../assets/images/stamps/{{ Stamp::getName($product->stamp_id) }}" alt="" class="img-tumbnail img-responsive">
                        </figure>
                    </div>
                    <div class="col-md-7">
                        <h2>{{ Stamp::getStampName($product->stamp_id) }} ({{ Modelo::getName($product->model_id) }})</h2>
                        <br/>
                        <p><strong>Precio: </strong> Bs. {{  number_format(Modelo::getPrice($product->model_id), 2, ',', '.') }} </p>
                        <p><strong>en Stock: </strong> {{ $product->amounts }} </p>
                        <br />
                        {{ Form::model($product, array('url' => '/cesta/agregar','role'=>'form','class'=>'col-md-3')) }}
                            <input type="number" name="quantities"  min="1" max="{{ $product->amounts }}" class="form-control col-xs-3" required="required" />
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="user_id" value="@if(Auth::check()){{ Auth::user()->id }}@endif">
                            <br />
                            <br />
                            <button type="submit" class="btn btn-success btn-lg">
                                    <i class="fa fa-shopping-cart fa-lg"></i>  Agregar a la Cesta
                            </button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop