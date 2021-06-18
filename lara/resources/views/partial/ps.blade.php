<div class=" list-group">
	@foreach (App\Models\category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent) 
		
	
  <a href="#m-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
  	<img src="{!! asset('images/cat/'.$parent->img)!!}" width="50" style="height: 20px;">{{ $parent->name }}
  </a>
  <div class="collapse @if (Route::is('fcat.show'))
       @if (App\category::porn($parent->id,$cata->id))
       show
       @endif
     @endif" id="m-{{ $parent->id }}">
  	@foreach (App\Models\category::orderBy('name', 'asc')->where('parent_id', $parent->id )->get() as $child)
  	  <a href="{!! route('fcat.show',$child->id) !!}" class="list-group-item list-group-item-action pl-5 @if (Route::is('fcat.show'))
       @if ($child->id==$cata->id)
       active
       @endif
     @endif ">
  	<img src="{!! asset('images/cat/'.$child->img)!!}" width="50" style="height: 20px;">{{ $child->name }}
  </a>
  @endforeach
  </div>
@endforeach
</div>