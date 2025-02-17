@extends('layouts.authcommon')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('action')
logout
@endsection

@section('content')
<form action="/logout" method="post">
    @csrf
    <button type="submit">ログアウト</buttpm>
</form>
@endsection
