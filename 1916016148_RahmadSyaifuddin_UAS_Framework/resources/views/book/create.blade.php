
@extends('layouts.navbar')

@section('content')
<br/>
    <form method="POST" action="{{ url('book') }}" enctype="multipart/form-data">
        @csrf
        @include('book.form')
    </form>
@endsection