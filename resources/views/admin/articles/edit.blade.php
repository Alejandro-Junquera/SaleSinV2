@extends('layouts.app')
  
@section('content')
<div class="container">
    <h2>Update Article</h2>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('admin.articles.update',$article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
     <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" value = "{{$article->title}}" placeholder="Title" >
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Img:</strong>
                <input type="text" class="form-control" value="{{$article->image}}" placeholder="Image" readonly>
                <br>
                <input type="file" name="image" placeholder="Image">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Description:</strong>
                <input type="text" name="description" class="form-control" value="{{$article->description}}" placeholder="Description">  
        </div>
        
        <div class = "col-xs-12 col-sm-12 col-md-12">
        <strong>Cicle:</strong>
        <div class="input-group{{ $errors->has('cicle') ? ' has-danger' : '' }}">
            <select class="form-control{{ $errors->has('cicle_id') ? ' is-invalid' : '' }}" name="cicle_id">
            @foreach($cicles as $cicle)
                @if($cicle->id==$article->cicle_id)
                    <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                        @foreach($cicles as $cicle)
                            <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                        @endforeach
                @endif
            @endforeach
            </select>
         </div>
        </div>  
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <br>
                <button class="btn btn-primary" type ="submit">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.articles.index') }}"> Back</a>
        </div>
    </div>
</div>
   
</form>
@endsection