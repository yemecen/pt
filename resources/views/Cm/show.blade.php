@extends('layouts.main')

@section('content')
<h1>{{$cm->Title}}</h1>
    <p>{{$cm->Description}}</p>
    <img src="{{URL::asset('/img/cm-1.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block"><br>
    <img src="{{URL::asset('/img/cm-2.png')}}" alt="" class="img-fluid img-thumbnail rounded mx-auto d-block">
    <div>
        <span class="badge badge-pill badge-secondary">{{$cm->created_at->format('d-m-Y')}}</span>
        <div class="float-right">
            <span class="badge badge-primary">story</span> 
            <span class="badge badge-success">blog</span> 
            <span class="badge badge-info">personal</span> 
            <span class="badge badge-warning">Warning</span>
            <span class="badge badge-danger">Danger</span>
        </div>         
    </div>
    <hr>
    @foreach ($cmDetail as $item)
        {{$item->Title}}
    @endforeach
@endsection