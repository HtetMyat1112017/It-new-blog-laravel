@extends('Blog.master')

@section('title','home')

@section("content")

    <div class="">
        <div class="py-3">

            <div class="small post-category mb-3">
                <a href="{{route('baseOnCategory',$article->category->id)}}" rel="category tag">{{$article->category->title}}</a>

            </div>

            <h2 class="fw-bolder">{{$article->title}} </h2>
            <div class="my-3 feature-image-box">
                <img src="{{asset('article_store/'.$article->photo)}}" class="w-100" style="height:400px" alt="">

                <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                    <div class="">

                        @if($article->user->photo)
                            <img src="{{asset('store/'.$article->user->photo)}}"
                                 class=" avatar avatar-50 photo rounded-circle" width="25" height="25"   alt="">
                        @else
                            <img src="public/dashboard/img/user-default-photo.png}"
                                 class=" avatar avatar-50 photo rounded-circle" width="30" height="30"   alt="">
                        @endif
                            <a href="#">{{$article->user->name}}</a></div>

                    <div class="text-primary">
                        <i class="feather-calendar"></i>
                        {{$article->created_at->format('d , Y ,M H:i a')}}
                    </div>
                </div>
                <div class="card border-0 mb-0">
                    <div class="card-body">
                        <p class="w-100 ">{{$article->description}}</p>
                    </div>
                </div>
                <hr>
                    <div class="">
                       <h2 class="font-weight-bold  border-bottom d-inline-block border-2 mb-4"> Relate Post</h2>
                    </div>
                    <div class="row">
                        @foreach($relate as $relates)

                        <div class="col-12 col-lg-6">
                            <a href="{{route('blog.detail',$relates->id)}} " class="text-decoration-none">
                            <div class="card mb-2">
                                <div class="card-body">
                                   <h4>{{$relates->title}}</h4>
                                    <a href="{{route('baseOnCategory',$relates->category->id)}}"  class="btn btn-sm btn-secondary rounded-pill" rel="category tag">{{$relates->category->title}}</a>
                                    <hr>
                                    <p>{{substr($relates->description,0,100)}}</p>



                                </div>
                            </div>
                            </a>
                        </div>

                        @endforeach
                    </div>

            @php
                $prePost=\App\Article::where('id','<',$article->id)->latest()->first();
                $nextPost=\App\Article::where('id','>',$article->id)->first();


            @endphp

                <div class="nav d-flex justify-content-between p-3">
                    <a href="{{isset($prePost) ? route('blog.detail',$prePost->id ):"#"}}"
                       class="btn btn-outline-primary page-mover rounded-circle @empty($prePost) disabled @endempty" >
                        <i class="feather-chevron-left"></i>
                    </a>

                    <a class="btn btn-outline-primary px-3 rounded-pill" href="{{route('blog.index')}}">
                        Read All
                    </a>

                    <a href="{{isset( $nextPost) ? route('blog.detail',$nextPost->id) : "#"}}"
                       class="btn btn-outline-primary page-mover rounded-circle @empty($nextPost) disabled @endempty"">
                        <i class="feather-chevron-right"></i>
                    </a>
                </div>
            </div>


        </div>

        <div class="d-block d-lg-none d-flex justify-content-center">
        </div>

    </div>


@endsection

