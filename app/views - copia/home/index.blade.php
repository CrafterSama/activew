@extends('layouts.home')

@section('title') {{ Configuration::getCompanyName() }} @stop
	
@section('content')

	<div class="main">
		<div class="text-center">
			<div class="container">
				<br />
				<br />
				<br />
				<br />
				<p class="text-justify pull-left">					
					<h3 class="white">Quieres estar a la moda, ejercitarte comodamente y verte bien al hacerlo?</h3>
					¡ActiveWear es la ropa deportiva que esta de moda y se ejercita contigo!
				</p>
				<br />
				<br />
				<p>
					<span class="text-center">
						<button class="btn btn-success btn-lg" onclick="location.href='productos'">
							Visita Los Productos Pioggia
						</button>
					</span>
				</p>
				<br />
				<br />
				<div class="social_buttons text-center">
					<a href="https://twitter.com/cariocaactive" class="twitter-follow-button" data-show-count="true" data-lang="es" data-dnt="true">Seguir a @pioggiamare</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					{{-- <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpioggiamare&amp;width=120&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
					{{  }}<br />
					<a data-pin-do="buttonFollow" href="http://es.pinterest.com/pioggiadimare/">Pioggia Di Mare</a>
					<!-- Please call pinit.js only once per page -->
					<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
					<br /> --}}
					<style>
						.ig-b- { display: inline-block; margin-top: 7px; }
						.ig-b- img { visibility: hidden; }
						.ig-b-:hover { background-position: 0 -60px; } 
						.ig-b-:active { background-position: 0 -120px; }
						.ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }
						@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
						.ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }
					</style>
					<a href="http://instagram.com/carioca_activewear?ref=badge" class="ig-b- ig-b-v-24"><img src="//badges.instagram.com/static/images/ig-badge-view-24.png" alt="Instagram" /></a>
				</div>
			</div>
		</div>
		<br />
		<br />
	</div>

@stop