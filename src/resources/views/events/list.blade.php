@extends('layouts.template')

@section('title', 'События')

@section('content')
    @foreach ($lists as $item)
        <a href="{{ url("/events/{$item->slug}") }}" class="card mb-4 text-decoration-none text-dark">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text">

                    {{Illuminate\Support\Str::words($item->body,20)}}
                </p>
                <p class="card-text">
                    <small class="text-muted">Опубликовано {{ $item->created_at }}</small>
                </p>
            </div>

            <?php $img = $item->pictures()->first(); ?>

            @if ($img)
                <img class="card-img-bottom"
                     src="{{$img->src}}"
                     alt="Card image cap">
            @else
                <img class="card-img-bottom"
                     src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
                     alt="Card image cap">
            @endif
        </a>
    @endforeach
@endsection
