
@extends('layouts.navbar')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books List</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
        body{
            background-color: white;
        }
        th{
            text-align: center;}
        .table-aksi{ 
            margin-left: 10px;
        }
        
    </style>

</head>
<body>
    <br/>
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
    @endif  
    <table class="table-aksi">
        <tr>
            <td>
                <a class="btn btn-info" href="{{ url('book/create') }}">Tambah</a>
            </td>
            <td>
                <form method="GET" action="{{ url('book') }}">
                    <input type="text" name="keyword" value="{{ $keyword }}" />
                    <button type="submit">Search</button>
                </form>
            </td>
        </tr>
    </table>
        
        <br/>
    <table class="table-bordered table" border="2px">
    <tr>
        <th>Cover</th>
        <th>Title</th>
        <th>Author</th>
        <th>Status</th>
        <th>Categories</th>
        <th>Stock</th>
        <th>price</th>
        <th colspan="2">menu</th>
    </tr>
    @foreach ($data as $dt=>$value)
    <tr>
        <td>
            @if(strlen($value->cover)>0)
                <img src="{{ asset('foto/'.$value->cover ) }}"/>
            @endif
        </td>
        <td>{{ $value->title }}</td>
        <td>{{ $value->author }}</td>
        <td>{{ $value->status }}</td>
        <td>{{ $value->categories }}</td>
        <td>{{ $value->stock }}</td>
        <td>{{ $value->price }}</td>
        <td>
            <center>
                <a class="btn btn-info" href="{{ url('book/'.$value->id. '/edit' ) }}">Update</a></td>
            </center>
            <td>
            <center>
            <form action="{{ url('book/' .$value->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger" type="submit "> Delete</button>
            </form>
            </center>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>
    
@endsection