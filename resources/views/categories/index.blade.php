@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories.index</h1>

    <ol>
        @foreach($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                <span class="author">author: {{ $category->author->name }}</span>
                @if ($category->editor)
                    <span class="author">(editor: {{ $category->author->name }})</span>
                @endif
            </li>
        @endforeach
    </ol>

</div>
@endsection
