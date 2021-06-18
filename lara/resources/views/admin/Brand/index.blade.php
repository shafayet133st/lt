 @extends('admin.page.m')
@section('content')
 <div class="content-wrapper">
         
    <div class="card">
      <div class="card-header text-center text-info display-4"> Brand Manager </div>
      <div class="card-body">
          @include('admin.page.e')
        <table class="table table-hover table-striped">
          <thead>
      <tr>
        <th>S/L</th>
        <th>Brand name</th>
        <th>Brand image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($Brand as $Brand)
        <td>{{$Brand->id}}</td>
        <td>{{$Brand->name}}</td>
        <td><img src="{!! asset ('images/Brand/'.$Brand->img)!!}" width="100px">
           </td>
         <td><a href="{{ route('admin.Brand.edit', $Brand->id) }}" class="btn btn-success">Edit</a>
         <a href="#deleteModal{{$Brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>
         <div class="modal" id="deleteModal{{$Brand->id}}">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Do You Want To DELETE</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body ">
          <table class="table btn-white">
            <tr>
              <td>
                <form action="{{ route('admin.delete', $Brand->id) }}" method="post">
            {{csrf_field()}}
            <button type="submit" class="btn btn-danger" >Yes</button>
          </form>
              </td>

              <td  style="padding-left: 230px;"">
            <button  type="button" class="btn btn-success " data-dismiss="modal"  >NO</button>            
              </td>
            </tr>

          </table>
          

        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

        </div>
        
      </div>
    </div>
  </div>
  
</div>

         </td>
      </tr>
      @endforeach
    </tbody>
        </table>
</div></div>
        </div>
@endsection