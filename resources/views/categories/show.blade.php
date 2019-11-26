@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>

    <p></p>
    <p>{{ $category->description }}</p>
    <p class="author">
            {{ $category->created_at }} {{ $category->author->name }} {{ $category->author->email }}
        @if ( $category->editor )
            (updated: {{ $category->updated_at }} {{ $category->editor->name }} {{ $category->editor->email }})
        @endif
    </p>

    <a href="{{ route('categories.index') }}">to list categories</a>

    @can('update', $category)
        or <a href="{{ route('categories.edit', $category) }}">edit this category</a>
    @endcan
    @can('delete', $category)
        or <a href="{{ route('categories.destroy', $category) }}">delete this category</a>
    @endcan

</div>
@endsection
