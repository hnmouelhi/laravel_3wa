<h2> Bienvenue, {{ Auth::user()->name }} </h2>
<!--{{Auth::user()->created_at->format('Y-m-D')}}-->
    {{Auth::user()->created_at->diffForHumans(now())}}
        <form action="{{route('handleAddClassroom')}}" method="post" >
            	{{ csrf_field() }}
            	<input type="text" name="title">
            	<input type="text" name="photo">
            	<button type="submit">ok</button>	           
        </form>

        <a href="{{route('handleLoginStudent')}}">logout</a>
            