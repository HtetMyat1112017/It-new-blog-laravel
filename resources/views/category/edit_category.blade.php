@extends("layouts.app")


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card mt-4">
                    <div class="card-body">
                       <h3><i class="feather-layers mr-2"></i>Edit Category</h3>
                        <hr>
                        <form action="{{route('category.update',$category->id)}}" method="post">
                            @method("PUT")
                            @csrf

                           <div class="form-row">
                               <input type="text" class="form-control w-75 mr-2" value="{{$category->title}} @error('title')  {{$message}} is-invalid @enderror" required  name="title">
                               <button class="btn btn-primary">edit</button>
                           </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
