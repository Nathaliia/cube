@extends('layouts.main')
@section('content')
<section>
  <form action="/cube/public/cube/store" method="post">
		<h3>CUBE SUMMATION</h3>
    <textarea name="text_data" id="" cols="30" rows="10" placeholder="Ingrese los tests..."></textarea>
    <input type="submit" value="Iniciar tests" />
  </form>
</section>
@stop
