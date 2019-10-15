@extends('index')
@section('title','Задачи')
@section('content')
    <br>
    <form action="{{route('taskMain')}}" method="Post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search" id="txtSearch"
                           value="{{$search}}"/>
                    <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    @if($tasks->total()>0)
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
        </div>
        @foreach ($tasks as $task)
            <div class="row clickRow" onclick="getTask({{$task['id']}})">
                <div class="col-md-2 col-xs-2">
                    {{$task['id']}}
                </div>
                <div class="col-md-2 col-xs-2">
                    {{$task['title']}}
                </div>
                <div class="col-md-2 col-xs-2">
                    {{$task['date']}}
                </div>
            </div>
        @endforeach
        {{ $tasks->links() }}
        <script>
            function getTask(id) {
                if ($('*').is('#myModalBox' + id)) {
                    $('#myModalBox' + id).modal('show');
                    console.log(1);
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('getTask')}}',
                        data: {
                            '_token': '{{ csrf_token()}}',
                            'id': id
                        },
                        success: function (data) {
                            $('body').append(data.html);
                            $('#myModalBox' + id).modal('show');
                        }
                    });
                }
            }
        </script>
    @else
        <p>Записей не найдено!</p>
    @endif
@endsection
