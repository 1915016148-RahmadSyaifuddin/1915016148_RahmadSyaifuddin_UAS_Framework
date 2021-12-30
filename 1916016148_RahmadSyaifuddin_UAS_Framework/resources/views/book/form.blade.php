<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img{
            width: 100px;
            height: 100px;
        }
        </style>
</head>
<body>
    <div class="row clearfix">
        <div class="col-md-6">Cover</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="file" name="cover">
            @foreach($errors->get('cover') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
            @if(strlen($model->cover)>0)
                <img src="{{ asset('foto/'.$model->cover) }}">
            @endif
        </div>
    </div> 
    
    <div class="row clearfix">
        <br/>
        <div class="col-md-6">Title</div>
        
        <div class="col-md-6">
            <input class="form-control" type="text" name="title" value="{{ $model->title }}"> 
            @foreach($errors->get('title') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-6">Author</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="text" name="author" value="{{ $model->author }}">
            @foreach($errors->get('author') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-6">Status</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="text" name="status" value="{{ $model->status }}">
            @foreach($errors->get('status') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-6">Categories</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="text" name="categories"  value="{{ $model->categories }}">
            @foreach($errors->get('categories') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-6">Stock</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="number" name="stock" value="{{ $model->stock }}">
            @foreach($errors->get('stock') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <div class="row clearfix">
        <div class="col-md-6">Price</div>
        
        <div class="col-md-6">
            <input class="form-control"  type="number" name="price" value="{{ $model->price }}">
            @foreach($errors->get('price') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">SIMPAN</button>

</body>
</html>
