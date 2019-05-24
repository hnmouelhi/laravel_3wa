<form action="{{route('handleLoginStudent')}}" method="post">
		{{ csrf_field() }}

	<input type="text" name="email">
	<input type="text" name="password">
	<button type="submit">login</button>
	
</form>
