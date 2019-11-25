@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="blue ta_c">Edit '{{ $category->name }}' category</h1>

    {{-- {{ dd($category) }} --}}
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="row">
            {{-- name --}}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('name field') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="{{__('Name')}}"
                        value="{{ old('name') ?? $category->name ?? '' }}" required>
                </div>
            </div>
            {{-- /name --}}

            {{-- slug --}}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="slug">{{ __('slug') }}</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="{{__('Slug')}}"
                        value="{{ old('slug')?? $category->slug ?? '' }}">
                </div>
            </div>
            {{-- /slug --}}
        </div>

        {{-- description --}}
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="form-group">
                    <label class="h3 blue" for="description">Description</label><br>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control" placeholder="Description"
                    >{{ old('description') ?? $category->description ?? '' }}</textarea>
                </div>
            </div>
        </div>
        {{-- description --}}

        <button type="submit" class="btn btn-primary form-control">{{ __('apply') }}</button>

    </form>


</div>
@endsection
