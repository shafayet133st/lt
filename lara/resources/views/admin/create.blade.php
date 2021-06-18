 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4"> Product Info</div>
      <div class="card-body">
        <form action="{{ route('admin.pstore')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('admin.page.e')
  <div class="form-group">
    <label for="Product Name">Product Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label>Description</label>
<br>
  <textarea  class="form-control"  name="description" rows="3" cols="0"></textarea>
  </div>
  <div class="form-group form-control">
    
    <label class="p1">Product Price</label><input type="number" name="price" >
  <label class="p1 a pl-5">Product Quantitty</label><input type="number" name="quantity">
  </div>
  <br>
    <div class="form-group form-control">
    
    <label class="p1">Select Category</label>

  <label class="p1 a"><select class="form-control" name="cat_id">
      <option value="">Pleace Select Category</option>
      @foreach (App\Models\category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent) 
      <option value="{{ $parent->id }}">{{ $parent->name }}</option>
      @foreach (App\Models\category::orderBy('name', 'asc')->where('parent_id', $parent->id )->get() as $child)
    <option value="{{ $child->id }}">---->{{ $child->name }}</option>
        @endforeach
      @endforeach
    
    </select></label>

    <!--------->
     <label class="p1 pl-5">Select Brand</label>

  <label class="p1 a "><select class="form-control" name="Brand_id">
      <option value="">Pleace Select Brand</option>
      @foreach (App\Models\brand::orderBy('name', 'asc')->get() as $Brand) 
      <option value="{{ $Brand->id }}">{{ $Brand->name }}</option>
      @endforeach
    
    </select></label>
  </div>
  <br> 
  <div class="form-group">
    <label>Product Image</label>
   
      
          <input type="file" class="form-control" name="pimg[]"  multiple="multiple"  id="pimg" >
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form></div>
        </div>
@endsection