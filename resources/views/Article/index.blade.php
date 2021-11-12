@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="text-head">
                            <h4><i class="feather-list mr-2"></i> Article List</h4>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <a href="{{route('Article.create')}}" class="btn btn-outline-primary"><i class="feather-plus-circle"></i>Create Article</a>
                                    @isset(request()->search)



                                                <a href="{{route('Article.index')}}" class="btn btn-outline-dark ml-2"><i class="feather-list"></i>All Article</a>


                                        <span>Search By "{{request()->search}} "</span>
                                    @endisset
                                </div>

                                <form  action="{{route('Article.index')}}" method="get">


                                    <div class="form-inline mb-2">
                                        <input type="text" class="form-control  w-75" name="search" placeholder="Search Article"  value="{{request()->search}}" required>

                                        <button type="submit" class="btn btn-primary ml-2 mb-0 px-3"><i class="feather-search" style="font-size: 20px"></i></button>
                                    </div>


                                </form>
                            </div>
                            @if(session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{session('message')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session('del_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{session('del_message')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Article</th>

                                    <th>Category Name</th>
                                    <th>User Name</th>

                                    <th>Control</th>
                                    <th>Created_at</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td> <b class="font-weight-bold">{{substr($article->title,0,20)}}</b>
                                            <br>
                                        {{ substr($article->description,0,50)}}. . .
                                        </td>

                                        <td>{{$article->category->title}}</td>
                                        <td>{{$article->user->name}}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('Article.show',$article->id)}}" class="btn btn-sm btn-success "><i class="feather-info text-white" style="font-size: 20px"></i></a>
                                                <a href="{{route('Article.edit',$article->id)}}" class="btn btn-sm btn-primary mx-2"><i class="feather-edit text-white" style="font-size: 20px"></i></a>

                                                <form action="{{route('Article.destroy',$article->id)}}"  method="post">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick=" return confirm('Are you sure delete this article')"><i class="feather-trash " style="font-size: 20px"></i></button>
                                                </form>
                                            </div>

                                        </td>
                                        <td><span><i class="feather-calendar"></i>{{$article->created_at->format('d-M-Y')}}</span>
                                            <br>
                                            <span><i class="feather-clock"></i>{{$article->created_at->format('h:i A')}}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">There is no data</td>
                                    </tr>

                                @endforelse

                                </tbody>


                            </table>
                            <div class="">
                                {{$articles->appends(request()->all())->links()}}
                                <p>Total - {{$articles->total()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


