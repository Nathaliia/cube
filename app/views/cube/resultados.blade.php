
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>CUBE SUMMATION RESULTADOS</h2>
		<div>
      @for ($test=1; $test <= $cantidad_test; $test++)
        {{ "<br>"."test: ".$test."<br>" }}
          @foreach ($resultados[$test] as $result)
            {{ $result."<br>" }}
          @endforeach

          @if( isset($this->errores[$test]) )
            @foreach ($this->errores[$test] as $value)
              {{ $value }};
            @endforeach
          @endif

      @endfor
		</div>
	</body>
</html>
