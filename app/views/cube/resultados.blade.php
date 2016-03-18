@extends('layouts.main')
@section('content')
<section>
		<h3>RESULTADOS</h3>
		<div class="resultados">
      @for ($test=1; $test <= $cantidad_test; $test++)
        {{ "<br><label class='titulo_test'>"."TEST ".$test."</label><br>" }}
          @foreach ($resultados[$test] as $result)
            {{ $result."<br>" }}
          @endforeach

          @if( isset($errores[$test]) )
            @foreach ($errores[$test] as $value)
              {{ $value }}
            @endforeach
          @endif

      @endfor
		</div>
		<a href="/public/cube" class="button">Nuevo Test</a>
</section>
@stop
