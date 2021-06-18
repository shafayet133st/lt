@extends('re.m')
@section('title')
{{$products->name}} |Shamma Beauty Shop
@endsection
@section('content')
<!-- side + con start -->
<div class="container-fluid">
	<div class="row">
		
	
	<div class="col-md-4 list-group p1">
<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
     @php
    $i=1;
    @endphp
   @foreach ($products->image as $img)  
    <div class="carousel-item {{$i==1? 'active':''}}">
      <img src="{{ asset('images/producti/'.$img->img)}}" width="100%" height="100%" alt="Los Angeles" >
    
  </div>
   @php
    $i++;
    @endphp
     @endforeach 
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div></div>
   </div>
<div class="col-md-8 p1">
	<div class="widget">
<h3>{{ $products->name}} </h3>
<h3>{{ $products->price}} TAKA <span class="badge badge-primary">{{ $products->quantity <1?'No Itam is Available' : $products->quantity. ' Itam in Stock'}}</span></h3>
<hr>
<table><tr><td ><dt>Description:-</dt></td><td><i>{{ $products->description}}</i></td></tr>
<tr><td ><dt>Category:-</dt></td><td><i>{{$products->Category->name}}</i></td></tr>
<tr><td ><dt>Brand:-</dt></td><td><i>{{$products->Brand->name}}</i></td></tr>

</table>
</div>
</div>
<div>
 

</div>
</div>
</div>

	<!-- side + con end -->
@endsection