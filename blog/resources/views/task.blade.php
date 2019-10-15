@extends('index')
@section('title','Задача')
@section('content')
    @if($task)
        <div class="row">
            <div class="col-md-2 col-xs-2">
                id
            </div>
            <div class="col-md-2 col-xs-2">
                Title
            </div>
            <div class="col-md-2 col-xs-2">
                Date
            </div>
            <div class="col-md-2 col-xs-2">
                Author
            </div>
            <div class="col-md-2 col-xs-2">
                Status
            </div>
            <div class="col-md-2 col-xs-2">
                Description
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-xs-2">
                {{$task['id']}}
            </div>
            <div class="col-md-2 col-xs-2">
                {{$task['title']}}
            </div>
            <div class="col-md-2 col-xs-2">
                {{$task['date']}}
            </div>
            <div class="col-md-2 col-xs-2">
                {{$task['author']}}
            </div>
            <div class="col-md-2 col-xs-2">
                {{$task['status']}}
            </div>
            <div class="col-md-2 col-xs-2">
                {{$task['description']}}
            </div>
        </div>
    @else
        <p>Записей не найдено!</p>
    @endif
@endsection
