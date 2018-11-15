<?php 
require_once('encabezado.php');
?>
<div class="container-fluid">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-id" data-slide-to="0" class=""></li>
			<li data-target="#carousel-id" data-slide-to="1" class=""></li>
			<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
		</ol>
		<div class="carousel-inner text-center "  >
			<div class="item text-center" >
				<img class="text-center" width="800px" heigth="520px" data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="slider/foto3.png">
				
			</div>
			<div class="item text-center">
				<img  class="text-center" width="800px" heigth="520px" data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="slider/foto1.jpg">
				
			</div>
			<div class="item active text-center">
				<img class="text-center" width="800px" heigth="520px" data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="slider/foto2.jpg">
				
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>

<?php 
require_once('pie_pagina.php');
 ?>