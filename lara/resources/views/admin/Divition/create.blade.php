 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4">Divition Info</div>
      <div class="card-body">
        <form action="{{ route('admin.distore')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.page.e')
  <div class="form-group">
    <label for="Divition Name">Divition Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Divition Name">
  </div>
  <br>
    <div class="form-group">
    <label>Priority</label>
   
      
          <input type="number" class="form-control" name="priority" >
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form></div>
        </div>
@endsection