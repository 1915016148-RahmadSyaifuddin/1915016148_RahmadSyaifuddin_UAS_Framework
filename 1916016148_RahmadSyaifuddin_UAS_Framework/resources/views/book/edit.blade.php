
@extends('layouts.navbar')

@section('content')
<br/>
    <form method="POST" action="{{ url('book/' .$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH"> 
        @include('book.form')
    </form>
@endsection