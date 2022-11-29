@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="">
        <div class="">
            <h2>Add new Article</h2>
        </div>
    </div>
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
   
<form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
     <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Img:</strong>
                <input type="file" name="image" class="form-control">
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="input-group{{ $errors->has('cicle') ? ' has-danger' : '' }}">
            <select class="form-control{{ $errors->has('cicle_id') ? ' is-invalid' : '' }}" name="cicle_id">
                <option value="" selected disabled hidden>Cicles</option>
                     @foreach($cicles as $cicle)
                        <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                     @endforeach
             </select>
         </div><br><br><br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary" href="{{ route('admin.articles.index') }}"> Back</a>
        </div>
    </div>
</div>
   
</form>
@endsection