 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4"> Product Info</div>
      <div class="card-body">
        <form action="{{ route('admin.cstore')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.page.e')
  <div class="form-group">
    <label for="Category Name">Category Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name">
  </div>
  <div class="form-group">
    <label>Description</label>
<br>
  <textarea  class="form-control"  name="description" rows="3" cols="0"></textarea>
  </div>
 <div class="form-group">
    <label>Parent Category(optional)</label>
<select class="form-control" name="parent_id">
  <option value="">select a praent Category</option> 
  @foreach ($Cat as $category)
  <option value="{{$category->id}}">{{$category->name}}</option> 
  @endforeach 

</select>
  
  </div>
  <br>
    <div class="form-group">
    <label>Product Image</label>
   
      
          <input type="file" class="form-control" name="image"  id="exampleInputEmail1" >
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form></div>
        </div>
@endsection