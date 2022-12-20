@foreach( $messages as $message) 
	@if($message->user_id != Auth::id() && $message->active == 0)
	@else
		<div class="chatbox__body__message  {{ (Auth::id() === $message->user_id) ? 'chatbox__body__message--right' : 'chatbox__body__message--left' }}">
			<div class="ul_section_full">
				<ul class="ul_msg">
					<li style="border-bottom: 1px solid #{{ $message->user->color }};"><strong style="color: #{{ $message->user->color }}">{{ $message->user->name }} {{ $message->user->surname }}</strong></li>

					@if($message->user_id == Auth::id() && $message->active == 0)
						<li><p style="opacity: .3;">{{ $message->message }}</p></li>
					@else 
						<li><p>{{ $message->message }}</p></li>
					@endif
				</ul>
			</div>
		</div>
	@endif
@endforeach