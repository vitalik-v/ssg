@extends('layouts.template')

@section('title', $event->title)

@section('h1', $event->title)

@section('content')
    <p>
        {{ $event->body }}
    </p>

    <h2 class="h3 mb-4 text-gray-800">
        Моменты с мероприятия
    </h2>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @for ($i = 0; $i < $event->pictures->count(); $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"
                    @if ($i == 0)
                    class="active"
                    @endif
                ></li>
            @endfor
        </ol>
        <div class="carousel-inner">
            @foreach ($event->pictures as $item)
                <div class="carousel-item
                    @if ($loop->first)
                    active
                    @endif
                    ">
                    <img class="d-block w-100" src="{{ $item->src }}" alt="First slide">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">
            <b>Дата: </b> {{ $event->created_at }}
        </li>
        <li class="list-group-item">
            <b>Офис: </b> {{ $event->office->name }}
        </li>
        <li class="list-group-item">
            <b>Тема: </b> {{ $event->topic->name }}
        </li>
        {{--        <li class="list-group-item d-flex justify-content-between align-items-center">--}}
        {{--            <b>Лайки </b>--}}
        {{--            <span class="badge badge-primary badge-pill">{{ $event->like }}</span>--}}
        {{--        </li>--}}
    </ul>

    <h2 class="h3 mb-4 text-gray-800">
        Расскажите своим друзьям!
    </h2>

    <div class="col-12 col-md-8 mb-3">
        <script src="https://yastatic.net/share2/share.js"></script>
        <div class="ya-share2" data-curtain data-limit="3"
             data-services="whatsapp,telegram,vkontakte,facebook,twitter"></div>
    </div>

@endsection
