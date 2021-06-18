 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4"> User  Edit</div>
      <div class="card-body">
        <form action="{{ route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.page.e')
  <div class="form-group">
    <label for="Category Name">Category Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label>Description</label>
<br>
  <textarea  class="form-control"  name="description" rows="3" cols="0">{{$user->description}}</textarea>
  </div>
 <div class="form-group">
    <label>Parent Category</label>
<select class="form-control" name="parent_id">
      <option value="">Primary Category</option> 
  @foreach ($user as $category)
  <option value="{{$category->id}}" {{$category->id == $user->parent_id ? 'selected':''}}>{{$category->name}}</option> 
  @endforeach 

</select>
  
  </div>
  <br>
    <div class="form-group">
    <label>Product Old Image:<img src="{!! asset ('images/user/'.$user->img)!!}" width="100px"></label>
   <label>Product Old Image:<input type="file" class="form-control" name="image"></label>
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Update Category</button>
</form></div></div>
        </div>
@endsection