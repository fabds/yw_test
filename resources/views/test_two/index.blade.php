@extends('layout')

@section('title', 'Test2')

@section('content')
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{url('/test2/analyze')}}">
                <div class="form-group">
                    <label for="sentence">Sentence</label>
                    <input required maxlength="255" class="form-control" type="text" id="sentence" name="sentence"/>
                    <small>Max 255 chars</small>
                </div>

                <button class="btn btn-primary btn-block">Analyze</button>
            </form>
        </div>
    </div>
@endsection