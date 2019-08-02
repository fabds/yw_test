@extends('layout')

@section('title', 'Test1 Done')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h3>Shuffled Deck</h3>
            @foreach($shuffledDeck as $item)
                <h3 class="badge badge-pill badge-primary">{{$item}}</h3>
            @endforeach
            <hr/>
            <h3>Stats</h3>
            <p>There are: {{count($shuffledDeck)}} cards in deck</p>
            <p>"Got it, the chance was {{$deck->getStat($shuffledDeck)}} %</p>
            <a href="{{url('/test1/reset')}}" class="btn btn-primary btn-block">Reset</a>
        </div>
    </div>
@endsection