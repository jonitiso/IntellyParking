<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SISTEMA DE PARQUEO</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
		<link rel="icon" href="{{ asset('img/favicon.png') }}">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	</head>
	<body>
		<style>
			.dataTables_filter {
				margin-left: -55px;
			}
			.btn-icon {
				margin: -14px 4px -10px -9px; vertical-align: middle;
			}
		</style>
		<div id="app">

			<header>
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="container">
						<a class="navbar-brand" href="{{ url('/') }}">IntelliParking</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="	navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
	
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item <?php if (url('/')==url()->current()): ?>
									active
								<?php endif ?> ">
									<a class="nav-link" href="{{ url('/') }}">Inicio</a>
								</li>
								<li class="nav-item <?php if (route('portal.index')==url()->current()): ?>
									active
								<?php endif ?> ">
									<a class="nav-link" href="{{ route('portal.index') }}">Portal</a>
								</li>
								<li class="nav-item <?php if (route('configuracion.index')==url()->current()): ?>
									active
								<?php endif ?> ">
									<a class="nav-link" href="{{ route('configuracion.index') }}">Configuracion</a>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a></li>
                        @else
                            <li class="dropdown">
                                <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret navbar-toggler-icon"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
						</div>
					</div>
				</nav>
			</header>
			<main>
				
				@yield('body')
			</main>
			<footer class="footer">
      		<div class="container">
					<span class="text-muted">Sistema desarrolado por Jonitiso</span>
				</div>
			</footer>
		</div>

		<script language="JavaScript" type="text/javascript">
 <!--

function show5(){
if (!document.layers&&!document.all&&!document.getElementById)
return

 var Digital=new Date()
 var hours=Digital.getHours()
 var minutes=Digital.getMinutes()
 var seconds=Digital.getSeconds()

var dn="PM"
if (hours<12)
dn="AM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12

 if (minutes<=9)
 minutes="0"+minutes
 if (seconds<=9)
 seconds="0"+seconds
//change font size here to your desire
myclock=""+hours+":"+minutes+":"
 +seconds+" "+dn+"</b></font>"
if (document.layers){
document.layers.liveclock.document.write(myclock)
document.layers.liveclock.document.close()
}
else if (document.all)
liveclock.innerHTML=myclock
else if (document.getElementById)
document.getElementById("liveclock").innerHTML=myclock
setTimeout("show5()",1000)
 }


window.onload=show5
 //-->
 </script>

<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>



		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
		<script src="js/app.js"></script>

 <script>
 	$(document).ready(function() {
	$('.datatable').DataTable( {
		"order": [[ 0, 'desc' ]],
		"language": {
			"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

		},
		"paging":   false,
        "info":     false
	} );
} );
 </script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


	</body>
</html>