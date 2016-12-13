@extends('layout.app')
@section('content')
<form method="post" >
    {{ csrf_field() }}
    <span> White: <input type="number" name="white"></span>
    <span> Black: <input type="number" name="black"></span>
    <button type="submit"> Create </button>
</form>
@endsection