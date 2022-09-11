@extends('layouts.template')

@section('title', 'Главная')

@section('content')
    <div class="row">
        <!-- Content Column -->
        <div class="col mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Статистика по офисам
                    </h6>
                </div>
                <div class="card-body">
                    @foreach ($offices as $office)
                        <h4 class="small font-weight-bold">
                            {{ $office->name }} <span class="float-right"> {{ $office->rating }}</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-danger" role="progressbar"
                                 style="width:  {{ $office->rating }}%"
                                 aria-valuenow=" {{ $office->rating }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
