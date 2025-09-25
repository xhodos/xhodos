<hodos:auth-layout>
	<form action="{{ route('login') }}" method="post" id="login-form">
		@csrf
		<div class="form-group">
			<label for="email"></label>
			<input type="text" name="email" placeholder="Email Address" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<label for="password"></label>
			<input type="password" name="password" placeholder="Password" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<button type="submit" class="fx-btn fx-btn-primary fx-btn-lg btn-submit">
				<span class="btn-text">Login</span>
				<i class="far fa-spinner-third fa-spin btn-loader" style="display: none"></i>
			</button>
		</div>
	</form>
	
	@push('scripts')
		<script src="{{ asset('assets/js/login.js') }}" type="module"></script>
	@endpush
</hodos:auth-layout>

