<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title>@yield('title', 'Shamma Beauty Shop')</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://kit.fontawesome.com/070783a410.js"></script>
     <link rel="stylesheet"  href="{{ asset ('css/style.css') }}">
     <link rel="stylesheet"  href="{{ asset ('css/sst.css') }}">
</head>
<body>
<div class="container-fluid bg-primary header-top d-none d-md-block">
  <div class="container">
    <div class="row text-light pt-2 pb-2">
      <div class="col-md-3"><i class="fa fa-envelope-o" aria-hidden="true"></i> shafayet133@gmail.com</div>
	  <div class="col-md-2 "><i class="fab fa-facebook"></i>@shamma.parlour</div>
       <div class="col-md-3"><i class="fas fa-mobile-alt"></i> 01955-112923 <mark>OR</mark> 01670891760 </div>
      
      <div class="col-md-2"><a href="{{route('login')}}" class="text-white"><i class="fa fa-user-o" aria-hidden="true"></i>Account</a></div>
      <div class="col-md-2"> <i class="fa fa-cart-plus" aria-hidden="true"></i> My Cart - $ 500.00</div>
    </div>
  </div>
</div>
<body>
	<!-- nav start -->
	<nav class="navbar navbar-expand-md  navbar-light bg-white  sticky-top">
<div class="container-fluid">
<a class="navbar-brand" href="index.php"><img src="{{ asset('st/lo.JPG')}}" alt=""  width="50px" height="50px" /></a>
	<h5 class="text-danger">Shamma Beauty Shop</h5>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
 <span class="navbar-toggler-icon"></span>
</button>

 

<div class=" collapse navbar-collapse" id="navbarResponsive">

<ul class="navbar-nav nab nav-tabs ml-auto">
   <li class="nav-item  active">
      <a class="nav-link" href="{{route('home')}}">HOME</a>
    </li>
   <li class="nav-item "><a class="nav-link"  href="{{route('product')}}">Product Sell</a></li>
	<li class="nav-item "><a class="nav-link"  href="about.php">About</a></li>
	<li class="nav-item "><a  class="nav-link" href="{{route('contact')}}">Contact</a></li>
	<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       All Categories
      </a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="cate.php">Electronics</a>
			<a class="dropdown-item" href="catm.php">Mobiles</a> 
			<a class="dropdown-item" href="cath.php">Home & Living</a>
			<a class="dropdown-item" href="catv.php">Vehicles</a>
			<a class="dropdown-item" href="catp.php">Property</a>
			<a class="dropdown-item" href="catf.php">Fashion Health Beauty</a>
			<a class="dropdown-item" href="catpa.php">Pets & Animals</a>
			<a class="dropdown-item" href="cated.php">Education</a>
			<a class="dropdown-item" href="cats.php">Services</a>
			<a class="dropdown-item" href="catj.php">Jobs</a>  
			<a class="dropdown-item" href="cathk.php">Hobbies, Sports & kids</a>
			<a class="dropdown-item" href="cathb.php">business & industry</a> 
			<a class="dropdown-item" href="catfo.php">Food  And Agriculture</a>
		     <a class="dropdown-item" href="catms.php"> MySelfSell DealsNEW!</a>
			
		</div>
	  </li>
  </ul>
  <div class="p">    <form class="form-inline" action="{!!route('search')!!}" method="get" >
	<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Search  For Product"  name="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary"  type="submit"><i class="fas fa-search"></i></button>
  </div>
</div>
	
 
  </form>
   </div>
 </div>
 </nav>
	<!-- nav end -->
	 @include('partial.e')

	@yield('content')


 <div class="container bg-secondary text-white text-center">
  <div class="row">
    <div class="col-sm-4 ">
	<h4>Contact with US</h4>
	<p>House-28/1, Section-11, Block-D, Avenue-3, Kalshi main Road, Pallabi, Mirpur, Dhaka-1216.</p>
	<div ><i class="fa fa-envelope-o" aria-hidden="true"></i> shafayet133@gmail.com</div>
	  <div><i class="fab fa-facebook"></i>@shamma.parlour</div>
	<div><i class="fas fa-mobile-alt"></i> 01955-112923 <mark>OR</mark> 01670891760 </div>
	</div>
	 <div class="col-sm-4 con3">
	<h4>Why Our Services</h4>
<p><t>আমরা অন্যান্য অনলাইন শপের মতো নই কারণ আমাদের এমন একটি অবস্থান রয়েছে যেখানে আপনি আমাদের পেতে পারেন। এমনকি আপনি দুটি কাজ একসাতে করতে পারেন (শপিং এবং পার্লারের কাজ)। 100% সত্যতার গ্যারান্টিযুক্ত। যদি কোনও সমস্যা হয় তবে আপনি 24 ঘন্টায় পরিবর্তন করতে পারেন।</t></p>
	</div>
	 <div class="col-sm-4">
	<h4> About Us</h4>
	<p class=>এটি একটি বিউটি পার্লার এবং বিউটি শপ কেবলমাত্র মহিলাদের জন্য। এখানে কোনও পুরুষ বা মানুষের জিনিস অনুমোদিত নয়। <br />আমরা গ্রাহক সন্তুষ্টি বিশ্বাস করি।</p>
	</div>
	</div></div>
	  <div class="container bg-dark ">
 <div class="text-center text-white"> <h5>Power by &#169; S@yed shafayet hossain</h5></div>
 </div>
</body>
</html>