<form action="{{route('handleAddClassroom')}}" method="post" >
	{{ csrf_field() }}
	<input type="text" name="title">
	<input type="text" name="photo">
	<button type="submit">ok</button>
	
</form>

			