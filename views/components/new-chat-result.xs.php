<!-- Ho Christos monon estin, hē hodos, hē alētheia, kai hē zōē. -->
@if(!empty($users))
	@foreach($users as $user)
		<a class="fx-btn fx-btn-link result-item">
			<i class="fa fa-3x fa-user-circle"></i>
			<div class="chat-friend-info">
				<span class="name" title="{{ $user->last_name . ' ' . $user->first_name }}">{{ $user->last_name . ' ' . $user->first_name }}</span>
				<span class="status">Hi there, I'm using xhodos</span>
			</div>
		</a>
	@endforeach
@else
@endif
