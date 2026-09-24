@extends('layouts.default')

@section('document-title')
<title>Admin - Users</title>
@endsection

@section('main-content')
<h1>View Users</h1>
<h1>Create New User</h1>
<form action="{{route('usercreated')}}" method="post">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder="Enter Desired username..." required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter Desired password..." required>
    <button type="submit">Submit</button>
</form>
@endsection