@extends('layout')

@section('title', 'Index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="{{url('/test1/')}}">Test1</a>
                <a class="list-group-item list-group-item-action" href="{{url('/test2/')}}">Test2</a>
            </div>
        </div>
    </div>
@endsection