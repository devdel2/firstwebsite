@extends('layouts.default')

@section('document-title')
<title>My Music</title>
@endsection

@section('main-content')
<h1>All Bands</h1>
    <ul>
        <li>
            <a href="{{route('daisyhead')}}">Daisyhead</a>
        </li>
        <li>
            <a href="{{route('tradition')}}">Tradition</a>
        </li>
        <li>
            <a href="{{route('runoff')}}">Runoff</a>
        </li>
    </ul>
@endsection