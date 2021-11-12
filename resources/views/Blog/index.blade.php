@extends('Blog.master')

@section('title','home')

@section("content")

<div class="">

    @forelse($article as $articles)
    <div class="card border-0 border-bottom mb-3">

        <div class="card-body">
           <a href="{{route('blog.detail',$articles->id)}}" class="text-decoration-none"><h4 class="text-primary font-weight-bold">{{$articles->title}}</h4></a>
            <div class="pb-3 ">

                <a href="{{route('baseOnCategory',$articles->category->id)}}" class="btn btn-sm btn-secondary rounded-pill px-3">{{$articles->category->title}}</a>

            </div>
            <img src="{{asset('article_store/'.$articles->photo)}}" class="w-100 rounded-3 mb-3" style="height:200px" alt="">


            <p class="text-black-50">{{substr($articles->description,0,300)}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class=" d-flex align-items-center">

                        @if($articles->user->photo)
                            <img src="{{asset('store/'.$articles->user->photo)}}"
                                 class=" avatar avatar-50 photo rounded-circle" width="30" height="30"   alt="">
                        @else
                            <img src="public/dashboard/img/user-default-photo.png}"
                                class=" avatar avatar-50 photo rounded-circle" width="30" height="30"   alt="">
                            @endif


                    <div class="">
                        <span><i class="feather-user"></i>{{$articles->user->name}}</span><br>
                        <span><i class="feather-calendar">{{$articles->created_at->format('d , M ,Y')}}</i></span>
                    </div>
                </div>
                    <a href="{{ route('blog.detail',$articles->id) }} " class=" btn btn-sm btn-outline-primary rounded-pill">See More</a>

            </div>
        </div>
    </div>
    @empty
        <div class="card">
            <div class="card-body">
                <h4 class="text-center"> There is no article</h4>
            </div>

        </div>
    @endforelse

</div>
<div class="d-none d-lg-none d-md-block d-sm-block" id="pagination">
    {{$article->onEachside(1)->links()}}
</div>


@endsection
@section('paginatePage')
    <div class="d-none d-lg-block" id="pagination">
        {{$article->onEachside(1)->links()}}
    </div>
@stop
