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
                            <!-- Delete -->
                            <a style="visibility: hidden"class="float-left"><-</a>
                                <a class="float-left">
                                <button type="button" class="btn btn-danger ttm-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$article->id}}">
                                    Delete
                                </button>
                                </a>
                                {{-- Delete - Modal --}}
                                <div class="modal fade" id="modal-delete-{{$article->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <form action="{{ route('admin.articleSoftD', $article->id)}}" method="POST" class="float-left">
                                     @csrf
                                     @method('POST')
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Article</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Delete {{$article->title}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" value="Delete" class="btn btn-danger btm-sm"/>
                                    </div>
                                    </div>
                                    </form>
                                </div>
                                </div>
                                {{-- End Delete Modal --}}
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

