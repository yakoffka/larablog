@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Category.create</h1>


    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="row">
            {{-- name --}}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">{{ __('name field') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="{{__('Name')}}"
                        value="{{ old('name') ?? $faker_category['name'] ?? '' }}" required>
                </div>
            </div>
            {{-- /name --}}

            {{-- slug --}}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="slug">{{ __('slug') }}</label>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="{{__('Slug')}}"
                        value="{{ old('slug')?? $faker_category['slug'] ?? '' }}">
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
                    >{{ old('description') ?? $faker_category['description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>
        {{-- description --}}

        <button type="submit" class="btn btn-primary form-control">{{ __('apply') }}</button>

    </form>


</div>
@endsection
