<div id="myModalBox{{$task['id']}}" class="modal">
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Заголовок модального окна -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Информация о задаче №{{$task['id']}}</h4>
        </div>
        <!-- Основное содержимое модального окна -->
        <div class="modal-body">
            <p>Заголовок: {{$task['title']}}</p>
            <p>Дата выполнения: {{$task['date']}}</p>
            <p>Автор: {{$task['author']}}</p>
            <p>Статус: {{$task['status']}}</p>
            <p>Описание: {{$task['description']}}</p>
        </div>
        <!-- Футер модального окна -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        </div>
    </div>
</div>
</div>