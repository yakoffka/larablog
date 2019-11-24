@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories.index</h1>

    <ol class="m0">
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                <span class="author">{{ $category->created_at }}</span>
                <span class="author">{{ $category->author->name }}</span>
                @if ( $category->editor )
                    <span class="author">(updated: {{ $category->updated_at }} {{ $category->editor->name }})</span>
                @endif
            </li>
        @endforeach
    </ol>

    <div class="mt-4">
        <a href="{{ route('categories.create') }}">create new category</a>
    </div>
</div>
@endsection
