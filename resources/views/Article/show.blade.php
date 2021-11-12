@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card mt-3">
                    <img src="{{asset('article_store/'.$articles->photo)}}" class="w-100" style="height:200px" alt="">

                    <div class="card-body">
                        <div class="">
                            <h4>{{$articles->title}}</h4>

                            <div class="text-primary my-2">
                                <span class="small">
                                    <i class="feather-layers">{{$articles->category->title}}</i>
                                </span>
                                <span class="small">
                                    <i class="feather-user">{{$articles->user->name}}</i>
                                </span>
                                |
                                <span class="small">
                                    <i class="feather-calendar">{{$articles->created_at->format('d-M-Y')}}</i>
                                </span>
                                |
                                <span class="small">
                                    <i class="feather-clock">{{$articles->created_at->format('h:i A')}}</i>
                                </span>
                            </div>


                            <p>{{$articles->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


