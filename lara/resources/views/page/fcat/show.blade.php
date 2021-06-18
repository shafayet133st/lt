@extends('re.m')
@section('content')
<!-- side + con start -->
<div class="container-fluid">
	<div class="row">
		
	
	<div class="col-md-2 list-group p1">
 @include('partial.ps')
   </div>
<div class="col-md-10 p1">
   <div><h3 class="text-center">All Product OF Category:-{{$cata->name}}</h3></div>
	<div class="row">
    

      @php 
    $products=$cata->products()->paginate(9);
    @endphp
		@foreach ( $products as $product)
<div class="col-md-3">
	
  <div class="card">
  	   <!--<img class="card-img-top" src="{{ asset('st/lo.JPG')}}" alt="Card image" style="width:100%"> -->
   @php 
$i=1;
    @endphp
       @foreach ( $product->image as $img)
      @if($i>0)
       	
       
   <img class="card-img-top" src="{{ asset('images/producti/'.$img->img)}}" alt="Card image" style="width:100%;height: 209px;">
   @endif
 @php $i--; @endphp
   @endforeach 
    <div class="card-body">
      <h4 class="card-title">{{ $product->name}}</h4>
      <p class="card-text">{{ $product->price}}</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
</div>
@endforeach 
</div>
</div>
</div>
</div>

	<!-- side + con end -->
@endsection