@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 col-lg-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <img src="{{!empty(auth()->user()->photo) ? asset('store/'.auth()->user()->photo) : asset('dashboard/img/user/avatar1.jpg')}}" class="w-100  rounded shadow-sm" alt="" style="height: 400px">
                            <form action="{{route('profile.updatePhoto')}}" method="post" class="mt-3" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <input type="file" name="image" class="form-control form-control-lg w-75 mr-2 ">
                                    <button class="btn btn-primary">Upload</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
