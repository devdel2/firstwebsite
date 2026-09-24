@extends('layouts.default')

@section('document-title')
<title>Home - Dev</title>
@endsection

@section('header')
<nav>
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Education</a></li>
        <li><a href="">Career</a></li>
        <li><a href="{{route("bands")}}">Music</a></li>
    </ul>
</nav>
@endsection
    
@section('main-content')
<div class="about-me-sect">
    <h1 class="name-title" id="name-title">Devin DeLeon</h1>
    <img src="{{asset('images/dev_portrait.jpeg')}}" alt="person smiling in the mountains with lake behind them.">
    <p class="age">Age: 22</p> 
    <p class="age">Location: Denver, Colorado, USA</p> 
    <p class="age">Email: notmyrealemail@uccs.edu</p> 
</div>
<div class="education">
    <h1>Education</h1>
</div>
<div class="career">
    <h1>Career</h1>
</div>
<div class="music">
    <h1>Music</h1>
    <p class="bands-desc">I currently play in a few bands that are based within Colorado Springs. The music created by these projects are a culmination of songs based on however I was feeling at the time. The genres range from metalcore, to post-hardcore to emo, pop punk and more. Click the link above to learn more about the projects I am currently active in and some that I have been involved with in the past.</p>
</div>
<div class="other">
    Other Hobbies
</div>
@endsection

@section('footer')

@endsection