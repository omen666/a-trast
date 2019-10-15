@extends('index')
@section('title','Задача')
@section('content')
    @if($task)
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
    @else
        <p>Записей не найдено!</p>
    @endif
@endsection
