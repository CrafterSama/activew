@extends('layouts.home')

@section('title') Desfiles @stop

@section('content')

	<div class="main">
		<div class="container">
             <div class="row clearfix">
                <div class="col-md-4 column">
                    <img src="/../assets/images/banner_galeria.jpg" alt="galerias" class="banner_top">
                </div>
                <div class="col-md-2 column">

                </div>
                <div class="col-md-4 column">
                    <div class="quote"><strong>Si estas cansada de empezar, deja de rendirte <br /> #CariocaActiveWear</strong></div>
                </div>
                <div class="col-md-2 column">
                        <img src="/../assets/images/Icono3.png" width='100%' align="right">
                </div>
            </div>
            <div class="row clearfix">
               <div class="col-md-3 column">
                </div>
                <div class="col-md-6 column">
                    <div id="contenido_galeria">
                        <div id="imagen1">
                            <img src="/../assets/images/galeria_1/1.jpg" alt="" />
                        </div>
                        <div id="imagen2">
                            <img src="/../assets/images/galeria_1/2.jpg" alt="" />
                        </div>
                        <div id="imagen3">
                            <img src="/../assets/images/galeria_1/3.jpg" alt="" />
                        </div>
                        <div id="imagen4">
                            <img src="/../assets/images/galeria_1/4.jpg" alt="" />
                        </div>
                        <div id="imagen5">
                            <img src="/../assets/images/galeria_1/5.jpg" alt="" />
                        </div>
                        <div id="imagen6">
                            <img src="/../assets/images/galeria_1/6.jpg" alt="" />
                        </div>
                        <div id="imagen7">
                            <img src="/../assets/images/galeria_1/7.jpg" alt="" />
                        </div>
                        <div id="imagen8">
                            <img src="/../assets/images/galeria_1/8.jpg" alt="" />
                        </div>
                        <div id="imagen9">
                            <img src="/../assets/images/galeria_1/9.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-3 column">
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-1 column">

                </div>
                <div class="col-md-10 column">
                    <div class="jMyCarousel">
                        <ul>
                            <li><a href="#imagen1" title=""><img src="/../assets/images/galeria_1/thumbs/1.jpg"alt="" /></a></li>
                            <li><a href="#imagen2" title=""><img src="/../assets/images/galeria_1/thumbs/2.jpg"alt="" /></a></li>
                            <li><a href="#imagen3" title=""><img src="/../assets/images/galeria_1/thumbs/3.jpg"alt="" /></a></li>
                            <li><a href="#imagen4" title=""><img src="/../assets/images/galeria_1/thumbs/4.jpg"alt="" /></a></li>
                            <li><a href="#imagen5" title=""><img src="/../assets/images/galeria_1/thumbs/5.jpg"alt="" /></a></li>
                            <li><a href="#imagen6" title=""><img src="/../assets/images/galeria_1/thumbs/6.jpg"alt="" /></a></li>
                            <li><a href="#imagen7" title=""><img src="/../assets/images/galeria_1/thumbs/7.jpg"alt="" /></a></li>
                            <li><a href="#imagen8" title=""><img src="/../assets/images/galeria_1/thumbs/8.jpg"alt="" /></a></li>
                            <li><a href="#imagen9" title=""><img src="/../assets/images/galeria_1/thumbs/9.jpg"alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1 column">

                </div>
            </div>




        </div>
    </div>
		<br />
		<br />
	</div>
						<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js?ver=1.4.4'></script>
            <script type="text/javascript" src="/../assets/js/jMyCarousel.min.js"></script>
            <script type="text/javascript">
                 $(document).ready(function() {
                    $(".jMyCarousel").jMyCarousel({ // Script de los Thumbnails
                    visible: '100%',
                    eltByElt: true
                    });
                $(".jMyCarousel img").fadeTo(100, 0.6);
                $(".jMyCarousel a img").hover(
                    function(){ //mouse over
                       $(this).fadeTo(400, 1);
                    },
                    function(){ //mouse out
                      $(this).fadeTo(400, 0.6);
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){ // Script de la Galeria
                  $('#contenido_galeria div').css('position', 'absolute').not(':first').hide();
                  $('#contenido_galeria div:first').addClass('aqui');
                  $('.jMyCarousel a').click(function(){
                      $('#contenido_galeria div.aqui').fadeOut(400);
                      $('#contenido_galeria div').removeClass('aqui').filter(this.hash).fadeIn(400).addClass('aqui');
                      return false;
                    });
                 });
            </script>
@stop
