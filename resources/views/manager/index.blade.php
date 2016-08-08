<h2>Manager</h2>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<a href="{{url('/createstaff')}}">Add Staff</a>
<a href="{{url('/chats')}}">chats</a>
<a href="{{url('/tasks')}}">My Tasks</a>

<a href="{{url('/createtask')}}">Create Task</a>
<a href="{{url('/createproduct')}}">Add Products</a>
 @if(Session::has('addproduct'))
           <p class="alert alert-success">{{Session::get('addproduct')}}</p>
 @elseif(Session::has('task'))
           <p class="alert alert-success">{{Session::get('task')}}</p>
 @endif