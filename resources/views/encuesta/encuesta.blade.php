<div class="panel-title p6"><h4>{{$data["encuesta"][0]->pregunta}}</h4></div>
<div id="resp"></div>
<form method="post" id="encuesta-form"  >
	
	@foreach ($data["encuesta"]["opciones"] as $opcion)
	    <div class="radio-custom radio-danger mb5">
		    <input type="radio" id="radio{{$opcion->id}}" name="voto" value="{{$opcion->id}}">
		    <label for="radio{{$opcion->id}}">{{$opcion->opcion}}</label>
		</div>
	@endforeach
	
	<button id="encuesta-boton" type="button" class="btn btn-dark btn-block " data-token="{{ csrf_token() }}">Votar</button>
</form>
<div id="pie" style="display:none;">
	<div id="high-pie2" style=" height: 210px; margin: 0 auto; " ></div>
</div>
