<nav class="navbar space-items">
	<div class="nav">
		<div class="nav-item">
			<a href="" class="nav-link responsive left-menu-toggler active" data-id="#chat-contacts" title="Chats">
				<span>Chats</span>
				<span><i class="far fa-comments"></i></span>
			</a>
		</div>
		<div class="nav-item">
			<a href="" class="nav-link responsive left-menu-toggler" data-id="#chat-requests" title="Chat Requests">
				<span>Requests</span>
				<span><i class="far fa-comment-dots"></i></span>
			</a>
		</div>
		<div class="nav-item">
			<a href="" class="nav-link responsive left-menu-toggler" data-id="#chat-archives" title="Archived">
				<span>Archived</span>
				<span><i class="far fa-archive"></i></span>
			</a>
		</div>
	</div>
	<div class="nav">
		<div class="dropdown nav-item">
			<a href="javascript:void(0);" class="dropdown-toggler" title="Profile">
				<i class="fad fa-3x fa-user-circle"></i>
			</a>
			
			<div class="dropdown-menu full-menu">
				<a href="{{ route('login') }}" class="dropdown-menu-item">Login</a>
				{{-- <a href="#" class="dropdown-menu-item">Test Link</a>
				<a href="#" class="dropdown-menu-item">Test Link</a> --}}
			</div>
		</div>
	</div>
</nav>
