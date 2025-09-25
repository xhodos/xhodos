<hodos:layout>
	<hodos:nav/>
	
	<div id="error-bag" data-errors='<?= json_encode(errorBag()) ?>'></div>
	<div class="chat-wrapper">
		<section id="chat-contacts" class="left-menu active">
			<div class="left-menu-header">
				<h3 class="section">
					<span>Friends</span>
					<a class="fx-btn fx-btn-link open-modal" title="New Chat" data-fx-target="modal" data-fx-modal="test-modal" style="font-size: 1.5rem"><i class="fad fa-comments-alt"></i></a>
				</h3>
				<div class="section">
					<input type="search" name="chats" id="chats" placeholder="Search">
				</div>
			</div>
			@foreach($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="{{ $chat_message['name'] }}">{!! $chat_message['name'] !!}</span>
						<div>
							<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
								<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
								&bull;
								<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
							</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		
		<section id="chat-requests" class="left-menu">
			<div class="left-menu-header">
				<h3 class="section">
					<span>Chat Requests</span>
				</h3>
			</div>
			@foreach($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
						<div>
						<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
							<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
							&bull;
							<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
						</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		<section id="chat-archives" class="left-menu">
			<div class="left-menu-header">
				<h3 class="section">
					<span>Archived</span>
				</h3>
			</div>
			@foreach ($chat_messages as $chat_message)
				<a href="" class="chat-friend" data-messages='<?php echo json_encode($chat_message); ?>'>
					<div class="chat-friend-img"><i class="fa fa-3x fa-user-circle"></i></div>
					<div class="chat-friend-info">
						<span class="name" title="<?= $chat_message['name']; ?>"><?= $chat_message['name']; ?></span>
						<div>
						<span class="message" title="<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>">
							<span class="date"><?= array_key_last($chat_message['messages']); ?></span>
							&bull;
							<?= end($chat_message['messages'][array_key_last($chat_message['messages'])])['message']; ?>
						</span>
						</div>
					</div>
				</a>
			@endforeach
		</section>
		
		<section id="chat-space">
			<div class="chat-space-body">
				<div class="chats">
					<div class="chat-init" style="margin: auto;">Click on a chat to start.</div>
					<div class="chat-top">
						<div class="bio">
							{{-- <i class="fa fa-4x fa-user-circle"></i>
							<h4>John Doe</h4>
							
							<span>You're friends</span>
							<span>Lives in Abuja</span>
							<span>Studied at UNKNWON</span> --}}
							
							{{-- <p><a href="">View profile</a></p> --}}
						</div>
					</div>
					<div class="chat-main">
					
					</div>
				</div>
			</div>
			<div class="chat-space-bottom">
				<button type="button" class="fx-btn rounded-circle fx-btn-primary" style="padding: 0;height: 35px;width: 35px;display: flex;">
					<i class="fa fa-paperclip fa-rotate-by" style="--fa-rotate-angle: -40deg;margin: auto;"></i>
				</button>
				<form action="{{ route('message.store') }}" method="post" id="chat-form">
					@csrf
					<div contenteditable="true" aria-placeholder="Type a message" id="chat-content" inputmode="true"></div>
				</form>
				<button type="submit" form="chat-form" class="fx-btn fx-btn-lg fx-btn-link fx-btn-primary"><i class="fa fa-send"></i></button>
			</div>
		</section>
		<!-- <aside id="contact-info">d</aside> -->
	</div>
	
	{{-- <div id="add-chat-modal">
		<div class="content-wrapper">
			<div class="content">Hello</div>
		</div>
	</div> --}}
	
	<div id="test-modal" class="fx-modal filter">
		<div class="fx-modal-dialog fx-dialog-full fx-dialog-scrollable">
			<div class="fx-modal-content" style="background-color: rgba(0,0,0,.5)">
				<div class="fx-modal-header" style="padding: .2rem .8rem">
					<span>New Chat</span>
					<span class="close" data-fx-action="close" data-fx-target="modal"></span>
				</div>
				<div class="fx-modal-body" style="color: white">
					<div id="new-chat-search-wrapper">
						<input type="search" name="new_chat" id="new_chat" placeholder="Start a new Chat" data-route="{{ route('fetch.users') }}">
						<div id="new-chat-result-wrapper">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@push('scripts')
		<script src="{{ asset('assets/js/app.js') }}" type="module"></script>
	@endpush
</hodos:layout>

