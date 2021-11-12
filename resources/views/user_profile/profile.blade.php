@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-lg-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center ">
                            <img src="{{!empty(auth()->user()->photo) ? asset('store/'.auth()->user()->photo) : asset('dashboard/img/user/avatar1.jpg')}}" class="w-50 rounded shadow-sm"  alt="">

                            <hr>
                            <h4 class="my-4 font-weight-bold ml-3">{{auth()->user()->name}}</h4>
                            <hr>
                            <h4 class="my-4 font-weight-bold ml-3"> {{auth()->user()->email}}</h4>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
