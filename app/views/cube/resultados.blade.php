@extends('layouts.main')
@section('content')
<section>
		<h3>RESULTADOS</h3>
		<div class="resultados">
      @for ($test=1; $test <= $cantidad_test; $test++)
        {{ "<br>"."test: ".$test."<br>" }}
          @foreach ($resultados[$test] as $result)
            {{ $result."<br>" }}
          @endforeach

          @if( isset($this->errores[$test]) )
            @foreach ($this->errores[$test] as $value)
              {{ $value }}
            @endforeach
          @endif

      @endfor
		</div>
		<a href="/cube/public/cube" class="button">Nuevo Test</a>
</section>
@stop
