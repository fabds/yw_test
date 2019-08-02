@extends('layout')

@section('title', 'Test1')

@section('content')
    <div class="row">
        <div class="col-6">
            <form method="post" action="{{url('/test1/choose')}}">
                <div class="form-group">
                    <label for="suit">Suits</label>
                    <select @if(isset($selected_suit) && !empty($selected_suit)) disabled @endif id="suit" name="suit" class="form-control">
                        @foreach($suits as $suit)
                            <option @if($suit==$selected_suit) selected @endif value="{{$suit}}">{{$suit}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="value">Values</label>
                    <select @if(isset($selected_value) && !empty($selected_value)) disabled @endif id="value" name="value" class="form-control">
                        @foreach($values as $value)
                            <option @if($value==$selected_value) selected @endif value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                @if((empty($selected_suit)) || empty($selected_value))
                    <button class="btn btn-primary">Choose</button>
                @endif

            </form>

            @if((!empty($selected_suit)) && !empty($selected_value))
                <a href="{{url('/test1/draft')}}" class="btn btn-primary">Draft</a>
                <a href="{{url('/test1/reset')}}" class="btn btn-primary">Reset</a>
            @endif
        </div>
        <div class="col-6">
            <h3>Shuffled Deck</h3>
            @foreach($shuffledDeck as $item)
                <h3 class="badge badge-pill badge-primary">{{$item}}</h3>
            @endforeach
            <hr/>
            <h3>Stats</h3>
            <p>There are: {{count($shuffledDeck)}} cards in deck</p>
            <p>You have chance {{$deck->getStat($shuffledDeck)}} %</p>
        </div>
    </div>
@endsection