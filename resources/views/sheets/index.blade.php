@extends('layouts.app')

@section('content')
    <ul>
        @foreach($spreadsheets as $id => $title)
            <li><a href="{{ route('sheets.show', $id) }}">{{ $title }}</a></li>
        @endforeach
    </ul>
@endsection
