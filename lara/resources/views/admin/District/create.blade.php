@extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4">District Info</div>
      <div class="card-body">
        <form action="{{ route('admin.dstore')}}" method="post" enctype="multipart/form-data">
          @csrf
          @include('admin.page.e')
  <div class="form-group">
    <label for="District Name">District Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter District Name">
  </div>
  <br>
    <div class="form-group">
    <label>Divition</label>
   
      
             <select class="form-control" name="Divition_id">
      <option value="">Pleace Select Divition</option>
      @foreach (App\Divition::orderBy('priority','asc')->get() as $Divition) 
      <option value="{{ $Divition->id }}">{{ $Divition->name }}</option>
      @endforeach
    
    </select>
      </div>
  <br>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form></div>
        </div>
@endsection