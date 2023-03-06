@extends('layout')
@section('title', 'Computers')
@section('content')
<div class="show">
        <h1>Computers Menu</h1>
    @if(count($computers) > 0)
    <ul>
        @foreach ($computers as $computer )
        <a href="{{route('computers.show',[ 'computer' => $computer['id']])}}">
            <li>{{$computer['name']}} his country is <strong> -( {{$computer['origin']}} )</strong> price is <strong>{{$computer['price']}}$</strong></li>
        </a>
        @endforeach
    </ul>
    @else
    <h3>We don't have a product in database</h3>
    @endif

</div>
@endsection
