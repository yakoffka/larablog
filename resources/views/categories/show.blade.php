@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>

    <p></p>
    <p>{{ $category->description }}</p>
    <p>{{ $category->author->name }}, {{ $category->created_at }}</p>

</div>
@endsection
