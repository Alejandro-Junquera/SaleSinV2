@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Articles</div>
                <br/>
                <div class="col-lg-11 col-md-11 col-sm-11 container justify-content-center">
                    </div>
                    <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                        @if($article->deleted==1)
                        @else
                        <tr>
                            <td><div class="col-lg-4 col-md-4 col-sm-4 container justify-content-center">{{$article->title}}<div></td>
                        </tr>
                        <tr>
                            <td>{{$article->description}}</td>
                        </tr>
                        <tr>
                            <td>
                            <a class="btn btn-primary btm-sm" href="{{ route('admin.articles.edit', $article->id ) }}"> Edit</a>
                            <a class="btn btn-danger btm-sm" href="{{ route('admin.articles.create') }}"> Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success" href="{{ route('admin.articles.create') }}"> Create New Article</a>
                    <br>
                    <br>
                 {{$articles->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

