@extends('index')
@section('title','Задачи')
@section('content')
    @if($tasks)
        <div class="row">
            <div class="col-md-1 col-xs-2">
                id
            </div>
            <div class="col-md-1 col-xs-2">
                Title
            </div>
            <div class="col-md-1 col-xs-2">
                Date
            </div>
        </div>
        @foreach ($tasks as $task)
            <div class="row">
                <div class="col-md-1 col-xs-2">
                    {{$task['id']}}
                </div>
                <div class="col-md-1 col-xs-2">
                    {{$task['title']}}
                </div>
                <div class="col-md-1 col-xs-2">
                    {{$task['date']}}
                </div>
            </div>
        @endforeach
    @endif
@endsection
