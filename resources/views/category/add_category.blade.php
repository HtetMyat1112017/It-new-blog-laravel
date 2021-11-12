@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <h3 class="font-weight-bold"><i class="feather-layers mr-2"></i>Category List</h3>
                    <hr>
                    <form  action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">
                        </div>
                        <div class="form-row">
                            <input type="text" class="form-control w-25 @error('title'){{$message}} is-invalid @enderror" name="title" placeholder="Add Category"  required>

                            <button class="btn btn-primary ml-2 px-4"><i class="feather-plus-circle" style="font-size: 20px"></i></button>
                        </div>


                    </form>
                    <div class="mt-3">
                        <table class="table table-bordered table-hover">
                            <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Category Name</th>
                                   <th>User Name</th>
                                   <th>Control</th>
                                   <th>Created_at</th>
                               </tr>
                            </thead>
                            <tbody>

                        @forelse($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('category.edit',$category->id)}} " class="btn btn-sm btn-primary mx-2"><i class="feather-edit text-white" style="font-size: 20px"></i></a>

                                        <form action="{{route('category.destroy',$category->id)}}"  method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-sm btn-danger"><i class="feather-trash " style="font-size: 20px"></i></button>
                                        </form>
                                    </div>

                                </td>
                                <td><span><i class="feather-calendar"></i>{{$category->created_at->format('d-M-Y')}}</span>
                                    <br>
                                <span><i class="feather-clock"></i>{{$category->created_at->format('h:i A')}}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">There is no category</td>
                            </tr>
                        @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
