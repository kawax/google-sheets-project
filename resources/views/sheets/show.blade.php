@extends('layouts.app')

@section('content')
    <ul>
        @foreach($sheets as $id => $title)
            <li><a href="{{ route('sheets.sheet', [$spreadsheet_id, $title]) }}">{{ $title }}</a></li>
        @endforeach
    </ul>
@endsection
