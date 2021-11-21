@extends('layouts.elements')

@section('title', 'Blog')

@section('headerStyles')
@parent
<link rel="stylesheet" href="{{ mix('css/blog.css') }}">
@endsection

@section('content')
@if (Auth::user())
<div class="row">
    <h1>Welcome to your Personalized Blog</h1>
</div>

@else
<h1>Blog</h1>
@endif
@endsection

