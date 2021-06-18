 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4"> Brand  Edit</div>
      <div class="card-body">
        <form action="{{ route('admin.update',$Brand->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.page.e')
  <div class="form-group">
    <label for="Brand Name">Brand Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$Brand->name}}">
  </div>
  <div class="form-group">
    <label>Description</label>
<br>
  <textarea  class="form-control"  name="description" rows="3" cols="0">{{$Brand->description}}</textarea>
  </div>

  <br>
    <div class="form-group">
    <label>Brand Old Image:<img src="{!! asset ('images/Brand/'.$Brand->img)!!}"  width="100px"></label>
   <label>Brand New Image:<input type="file" class="form-control" name="image" value="{!! asset ('images/Brand/'.$Brand->img)!!}"></label>
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Update Brand</button>
</form></div></div>
        </div>
@endsection