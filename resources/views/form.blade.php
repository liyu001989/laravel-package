@extends('layouts.app')

@section('content')
<form method="POST" action="/form">
    {{ csrf_field() }}
    <textarea name="test"></textarea>
    <button type="submit">submit</button>
</form>
@endsection
