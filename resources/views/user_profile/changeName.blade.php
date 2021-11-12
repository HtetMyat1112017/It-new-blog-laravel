@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="">

                            <form action="{{route('profile.updateName')}}" method="post" class="mt-3" >
                                @csrf
                                <div class="form-group">
                                    <label for="" ><b>Change Name</b></label>
                                    <hr>
                                    <input type="text" class="form-control form-control-lg w-100 mr-2 " value="{{auth()->user()->name}}" name="name" >

                                </div>
                                <button type="submit" class="btn btn-primary float-right">Change Name</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="">

                            <form action="{{route('profile.updateEmail')}}" method="post" class="mt-3" >
                                @csrf
                                <div class="form-group">
                                    <label for="" ><b>Change Email</b></label>
                                    <hr>
                                    <input type="text" class="form-control form-control-lg w-100 mr-2 " value="{{auth()->user()->email}}" name="email" >

                                </div>
                                <button type="submit" class="btn btn-primary float-right">Change Email</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

