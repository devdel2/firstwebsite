@extends('layouts.default')

@section('document-title')
<title>Daisyhead</title>
@endsection

@section('main-content')
<h1>Daisyhead</h1>
<a href="{{route('bands')}}">Back</a>
<a href="{{route('home')}}">Home</a>
@endsection