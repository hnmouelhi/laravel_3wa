<form action="{{route('handleAddStudent')}}" method="post" >
	{{ csrf_field() }}
	<input type="text" name="title">
	<input type="text" name="email">
	<input type="text" name="password">
	<button type="submit">ok</button>
	<select name="student">
                @foreach($classrooms as $classroom)
                <option value="{{$classroom->id}}">{{$classroom->title}}</option>
                @endforeach
   	</select>
</form>

			