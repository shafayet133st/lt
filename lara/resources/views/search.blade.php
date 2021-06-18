@extends('re.m')
@section('content')
<!-- side + con start -->
<div class="container-fluid">
	<div class="row">
	
	
<div class="col-md-2 list-group p1">
 @include('partial.ps')
</div>
<div class="col-md-10  p1">
  <div class="widget">
    <div class="row">
    @foreach ( $products as $product)
<div class="col-md-3">
  
  <div class="card">
       <!--<img class="card-img-top" src="{{ asset('st/lo.JPG')}}" alt="Card image" style="width:100%"> -->
   @php 
$i=1;
    @endphp
       @foreach ( $product->image as $img)
      @if($i>0)
        
     <a href="{!! route('product.show', $product->slug)!!}">  
   <img class="card-img-top" src="{{ asset('images/producti/'.$img->img)}}" alt="{{ $product->name}}" style="width:100%;height: 209px;"></a>
   @endif
 @php $i--; @endphp
   @endforeach 
    <div class="card-body">

      <h4 class="card-title"><a href="{!! route('product.show', $product->slug)!!}">{{ $product->name}}</a></h4>

      <p class="card-text">{{ $product->price}}</p>
      <button type="button" class="btn btn-outline-warning">Add To Cart</button>
    </div>
  </div>
</div>
@endforeach 
  </div>

</div>
<div class="mt-4 pagination">
    {{ $products->links()}}


  </div>
  
  
</div>
</div>
  
</div>

	<!-- side + con end -->
@endsection
