@extends('layout')

@section('title', 'Test2 Result')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            <h3>Sentence</h3>
            <p>{!!$sentence!!}</p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Letter</th>
                        <th>Count</th>
                        <th>Before</th>
                        <th>After</th>
                        <th>Max Distance</th>
                    </tr>
                @foreach($analysis['els'] as $k => $v)
                    <tr>
                        <td>
                            {{$k}}
                        </td>
                        <td>
                            {{count($v)}}
                        </td>
                        <td>
                            {{$sentence_object->getStringedArray($v,'before')}}
                        </td>
                        <td>
                            {{$sentence_object->getStringedArray($v,'after')}}
                        </td>
                        <td>
                            {{$sentence_object->getDistance($v)}}
                        </td>
                    </tr>
                @endforeach
                </table>
            </div>
            <a href="{{url('/test2/')}}" class="btn btn-primary btn-block">Reset</a>
        </div>
    </div>
@endsection