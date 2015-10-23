@extends('blog.mainblog')
@section('title'){{$user}}@endsection
@section('content')
@include('blog.partials.mainmenuusers')
<div class="row-fluid">
		<div class="container" id="admin">
			@if(\Session::has('alert'))
				<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>{{Session::get('alert')}}</strong>
				</div>
			@endif
			<div	align="center">
				<div id="Temporizador"></div>
				<div id="Mediciones">
					<table id="TT">
						<tr>
								<td align="center">Dias</td>
								<td align="center">Hrs</td>
								<td align="center">Min</td>
								<td align="center">Seg</td>
						</tr>
					</table>
				</div>
			</div><br>
			<table class="table table-striped table-hover table-bordered">
				<thead>
					<th>Titulo</th>
					<!--<th>Autor</th>-->
					<th>Creado el</th>
					<th>Modificado el</th>
					<th class="foo">Acciones</th>
				</thead>
				<tbody>
					@foreach($posts as $x)
						<tr>
							<td>{{$x->title}}</td>
							<!--<td>{{$x->slug}}</td>-->
							<td>{{$x->created_at}}</td>
							<td>{{$x->updated_at}}</td>
							<td width="20%">
								<div class="btn-group-justified">
									<a href="{{URL::to('admin/posts/'.$x->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
									<a href="{{URL::to('admin/posts/'.$x->id.'/delete')}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<h1>
				<div id="Temporizador">
				</div>

			</h1>
		</div>
		<style>
        #Temporizador{
          font-size: 20px;
					color: black;
        }
        #Mediciones{
					align:center;
					width: 170px;
          font-size: 5px;
          border: 2px solid #FAE098;
          -moz-border-radius: 10px;
          -webkit-border-radius: 10px;
        }
        #TT{
					align:center;
          width: 155px;
					font-size: 10px;
        }
    </style>
		<div>
		<?php
		foreach($inaguracion as $i) {
		  $hour =  $i->hora;
		  $minute = $i->minutos;
		  $month = $i->mes;
		  $day = $i->dia;
		  $year = $i->anio;
		}
		$event = 'La CCbol a Iniciado';

		$remaining = date('U', mktime($hour, $minute, 0, $month, $day, $year)) - date('U');
		//echo date('U');
		$days = floor($remaining / 60 / 60 / 24);
		$hours = $remaining / 60 / 60 % 24;
		$minutes = $remaining / 60 % 60;
		$seconds = $remaining % 60;
		?>
		<script type="text/javascript">
		var days = '<?php echo $days; ?>';
		var hours = '<?php echo $hours; ?>';
		var minutes = '<?php echo $minutes; ?>';
		var seconds = '<?php echo $seconds; ?>';
		var finished = false;
		function updatecountdown(){
		  seconds--;
		  if(seconds < 0){
		    seconds = 59;
		    minutes--;
		    if(minutes < 0){
		      minutes = 59;
		      hours--;
		      if(hours < 0){
		        hours = 23;
		        days--;
		        if(days < 0){
		          finished = true;
		        }
		      }
		    }
		  }

		  if(!finished){
		    if(days < 10){
		    var message = '0'+days + ' : ';
		    }
		    else{
		      message = days + ' : '
		    }
		    if(hours < 10){
		      message += '0'+hours + ' : ';
		    }
		    else{
		      message += hours + ' : ';
		    }
		    if (minutes < 10) {
		      message += '0'+minutes + ' : ';
		    }else {
		      message += minutes + ' : ';
		    }
		    if (seconds < 10 ) {
		      message += '0'+seconds + '';
		    }else {
		      message += seconds + '';
		    }


		    //message += '<?php echo $event; ?>!';
		    message += '<br>';
		    //var message2 = 'Dias'+' '+'Hrs'+' '+'Min'+' '+'Seg';
		    document.getElementById('Temporizador').innerHTML = message;
		  //  document.getElementById('Mediciones').innerHTML = message2;
		  }
		  else{

		    /*elemento = document.getElementById("Mediciones")
		    ocultar= elemento.style.display='none';
		    Temporizador = document.getElementById("Temporizador");
		    mover= Temporizador.style.left='330px';*/
		    document.getElementById('Temporizador').innerHTML = '<?php echo $event; ?>!';
		    clearInterval(theInterval);
		  }
		}

		var theInterval = setInterval("updatecountdown()", 1000);
		</script>
		</div>
</div>
@stop
