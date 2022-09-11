@extends('layouts.template')

@section('title', 'Создать событие')

@section('h1', 'Создать событие')


@section('content')
    @if($errors->any())
     <div class="alert">
         <ul>
             @foreach($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ route('add.event') }}">
        @csrf
        <div class="form-group">
            <label for="eventTitle">
                Заголовок
            </label>
            <input type="text" class="form-control" id="eventTitle" name="eventTitle">
        </div>
        <div class="form-group">
            <label for="eventText">
                Текст
            </label>
            <textarea class="form-control no-resize" id="eventText" name="eventText" rows="6"></textarea>
        </div>
        <div class="form-group">
            <label for="eventImage">
                Иллюстрации
            </label>
            <input
                type="file"
                accept="image/png, image/jpeg"
                multiple
                class="form-control-file"
                id="eventImage"
                name="eventImage"
            >
        </div>
        <div class="form-group">
            <label for="eventOffice">
                Офис
            </label>
            <select class="form-control" id="eventOffice" name="eventOffice">
                @foreach ($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="eventCategory">
                Тема
            </label>
            <select class="form-control" id="eventCategory" name="eventCategory">
                @foreach ($topics as $topic)
                    <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            Опубликовать
        </button>
    </form>
@endsection
