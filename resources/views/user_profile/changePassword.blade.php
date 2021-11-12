@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="">

                            <form action="{{route('profile.updatePassword')}}" method="post" class="mt-3" >
                                @csrf
                                <div class="form-group">
                                    <label for="" ><b>Current Password</b></label>

                                    <input type="password" class="form-control form-control-lg w-100 mr-2 " value="" name="current_password" placeholder="Enter a old password" >

                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="" ><b>New Password</b></label>

                                    <input type="password" class="form-control form-control-lg w-100 mr-2 " value="" name="new_password" >

                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="" ><b>Confirm Password</b></label>

                                    <input type="password" class="form-control form-control-lg w-100 mr-2 " value="" name="new_password" >

                                </div>
                                <button type="submit" class="btn btn-primary float-right">Change Password</button>
                            </form>
                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection

