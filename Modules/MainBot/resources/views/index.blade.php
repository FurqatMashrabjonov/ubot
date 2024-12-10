@extends('mainbot::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('mainbot.name') !!}</p>
@endsection
