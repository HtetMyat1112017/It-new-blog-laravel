@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="text-head">
                            <h4><i class="feather-plus-circle mr-2"></i> Create Article</h4>
                        </div>

                        <form action="{{route('Article.update',$articles->id)}}" id="editArticle" method="post">
                            @csrf
                            @method("PUT")
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <label for="">Select Category</label>
                            <select name="category"  form="editArticle" class="custom-select custom-select-lg @error('category') {{$message}} is-invalid @enderror " id="">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)

                                    <option value="{{$category->id}} " {{old('category',$articles->category_id) == $category->id ?'selected ' :''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <label for="">Article Photo</label>
                            <div class="">
                                <img src="{{asset('article_store/'.$articles->photo)}}" class="w-100" style="height: 100px" alt="">
                            </div>
                            <input type="file"  name="images" class="form-control @error('photo') {{$message}} is-invalid @enderror"  form="createArticle">
                            @error('photo')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="form-control" value="{{auth()->user()->id}}" form="editArticle">
                        </div>
                        <div class="form-group mb-0">
                            <label for="">Article Title </label>
                            <input type="text" class="form-control  @error('title') {{$message}} is-invalid @enderror" form="editArticle" value="{{old('title',$articles->title)}}" name="title">
                            @error('title')
                            <small class="text-danger">{{$message}}></small>
                            @enderror
                        </div>
                        <div class="form-group mb-0 mt-3">
                            <label for="">Article Description</label>
                            <textarea name="description" class="form-control form-control-lg @error('description') {{$message}} is-invalid @enderror"  form="editArticle" id="" cols="30" rows="15">{{old('description',$articles->description)}}</textarea>
                            @error('description')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card mt-2">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100" form="editArticle">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
