@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Manage Offers</div>
                <br/>
                <div class="container justify-content-center">
                    </div>
                    <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        
                    </thead>
                    <tbody>
                        @foreach($offers as $offer)
                            @if($offer->deleted==0)
                                @foreach($applies as $apply)
                                    @if($apply->offer_id != $offer->id)
                                        <tr class="col-md-12">

                                        @foreach($cicles as $cicle)
                                            @if($offer->cicle_id == $cicle->id)
                                                <td>
                                                @if($cicle->img != "")
                                                    <img src="{{ asset('img_ciclos/'.$cicle->img) }}" style="width:40px;"></>
                                                    @else
                                                    <img src="{{ asset('img_ciclos/noimage.png') }}" style="width:40px;"></>
                                                @endif
                                                </td>
                                            @endif
                                        @endforeach
                                        <td>
                                        <strong>{{$offer->title}}</strong>
                                        <br>
                                        </td>
                                        <td> 
                                        <div style="text-align: right;width:150px">
                                        <form action="{{ route('user.offerApply', $offer->id)}}" method="POST" class="float-right">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-primary btm-sm float-right"> Apply</button>
                                        </form>
                                        <!-- Show -->
                                        <a style="visibility: hidden"class="float-right"><-</a>
                                        <a class="float-right">
                                        <button type="button" class="btn btn-primary ttm-sm" data-bs-toggle="modal" data-bs-target="#modal-show-{{$offer->id}}">
                                            Show
                                        </button>
                                        </a>
                                        <!-- {{-- Show - Modal --}} -->
                                        <div class="modal fade" id="modal-show-{{$offer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('user.offers.show', $offer->id)}}" method="GET" class="float-right">
                                                @csrf
                                                @method('GET')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title" id="exampleModalLabel">Offer details</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <strong>{{$offer->title}}</strong>
                                                    <br>
                                                    {{$offer->description}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- {{-- End Show Modal --}} -->
                                        </div>
                                        </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
                
                    <br>
                    {{$offers->links()}}
                    <br>
                    <a class="btn btn-success" href="{{ route('user.offers.create') }}"> Create New Offer</a>
                </div>
            </div>
        </div>
    </div>
@endsection