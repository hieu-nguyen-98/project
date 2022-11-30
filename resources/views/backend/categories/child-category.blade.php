@foreach($childreanCategories as $child)
	<option value="{{$child->id}}" class="text-danger">{{ ucfirst($child->parent->name)}} => {{ ucfirst($child->name)}}</option>
	@if(count($child->childrenCategory))
		@foreach($child->childrenCategory as $items)
		<option value="{{$items->id}}" class="text-primary"> {{ucfirst($items->parent->name)}} => {{ucfirst($items->name)}} </option>
		@endforeach
	@endif
@endforeach