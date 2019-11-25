@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories.index</h1>

    <table class="blue_table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>author</th>
            <th>created</th>
            <th>editor</th>
            <th>edited</th>
            <th>action</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="ta_l">
                    <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                </td>
                <td class="author ta_l">
                   {{ $category->author->name }}
                </td>
                <td class="author">
                    {{ $category->created_at }}
                </td>
                <td class="author ta_l">
                    @if ( $category->editor )
                        {{ $category->editor->name }}
                    @endif
                </td>
                <td class="author">
                    @if ( $category->editor )
                        {{ $category->updated_at }}
                    @endif
                </td>
                <td>
                    @can('update', $category)
                        <a href="{{ route('categories.edit', $category) }}">edit</a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <a href="{{ route('categories.create') }}">create new category</a>
    </div>
</div>
@endsection
