@foreach( $messages as $message) 

	<div class="alert alert-chat" style="{{ ($message->active == 1) ? "background-color: rgba(0, 0, 0, 0.5);" : "" }}" role="alert">
	    <div class="name">
	        <p><small>{{ $message->user->email }}</small></p>&nbsp;&nbsp;&nbsp; <p><small>( {{ $message->created_at }} )</small></p>
	       <div class="action-btn">

	       		@if($message->active != 1)
	            	<a class="done" href="{{ url('/admin/activate-message/'.$message->id) }}"><i class="material-icons">done</i></a>
	            @endif
	            
	            <a class="delete" href="" onclick="event.preventDefault();
                    document.getElementById('delete-{{ $message->id }}').submit();">
                    <i class="material-icons">delete</i>
                </a>
                <form id="delete-{{ $message->id }}"
              		action="{{ url('admin/delete-message/' . $message->id) }}"
                    method="POST"
                    style="display: none;">
                    @csrf
		            @method('DELETE')
		        </form>
	        </div>
	    </div>
	    <p>{{ $message->message }}</p>
	</div>
	
@endforeach