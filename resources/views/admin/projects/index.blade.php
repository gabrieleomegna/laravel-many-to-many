@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>
                These are all your available projects, {{Auth::user()->name}}
            </h2>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Number of days to be completed</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $projects as $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td>{{$project->title}}</td>
                            <td>{{$project->author}}</td>
                            <td>{{$project->no_days_taken}}</td>
                            <td>
                                <a href="{{route('admin.projects.show', $project)}}">
                                    <button class="btn btn-sm btn-primary">View</button>
                                </a>
                                <a href="{{route('admin.projects.edit', $project)}}">
                                    <button class="btn btn-sm btn-success">Edit</button>
                                </a>
                                <button class="btn btn-sm btn-warning">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <h3>There are no projects...</h3>
                    @endforelse
                </tbody>
              </table>
              <a href="{{route('admin.projects.create')}}">
                  <button class="btn btn-xl btn-primary">Create new project</button>
              </a>
        </div>
    </div>
</div>
@endsection