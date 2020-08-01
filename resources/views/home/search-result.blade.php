@extends('layouts.basicwithoutshare')

@section('content')
<div class="container">
{{-- csrf Token --}}
    <div class="row">
        @foreach($searches as search)
        <h2>{{ $search->title }}</h2>
        @endforeach
    </div>
</div>
@endsection
