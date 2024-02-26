@extends('layouts.admin')

@section('head-title')
@yield('page-title')
@endsection

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                @csrf
                @yield('form-method')
                
                <div class="form-group mb-3">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title', $project->title)}}">
                </div>
                <div class="form-group mb-3">
                  <label for="author">Author</label>
                  <input type="text" class="form-control" id="author" name="author" value="{{old('author', $project->author)}}">
                </div>
                
                {{-- @if (isset($project->type_id))     --}}
                <div class="form-group mb-3">
                    <label for="type_id" class="input-group-text">Type_id:</label>
                    <select name="type_id" id="type_id" class="form-select">
                        @foreach ( $types as $type )
                            <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                                {{$type->type_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- @endif --}}
                {{-- @if ({{Route::currentRouteName()}} == 'admin.projects.create') 
                    <div class="form-group mb-3">
                        <label for="type_id" class="input-group-text">Type id:</label>
                        <select name="type_id" id="type_id" class="form-select">
                            @foreach ( $types as $type )
                                <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                                    {{$type->type_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif --}}

                <div class="input-group mb-3">
                    <div>
                        @foreach ($technologies as $technology)
                            <input class="form-check-input" type="checkbox" id="technologies-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" 
                            {{in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : ''}}>
                            <label class="form-check-label" for="technologies-{{$technology->id}}">{{$technology->name}}</label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="proj_image">URL image</label>
                    <input type="text" class="form-control" id="proj_image" name="proj_image" value="{{old('proj_image', $project->proj_image)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="description">Type a description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{old('description', $project->description)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="start_date">Date of starting the project</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{old('start_date', $project->start_date)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="completion_date">Date of completing the project</label>
                    <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{old('completion_date', $project->completion_date)}}">
                </div>
                <div class="form-group mb-3">
                    <label for="no_days_taken">Number of days to make the project</label>
                    <input type="number" class="form-control" id="no_days_taken" name="no_days_taken" value="{{old('no_days_taken', $project->no_days_taken)}}">
                </div>
                <button type="submit" class="btn btn-primary">@yield('page-title')</button>
              </form>
        </div>
    </div>
</div>
@endsection