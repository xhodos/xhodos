<hodos:auth-layout>
	<form method="post" action="{{ route('register') }}" id="register-form">
		@csrf
		
		<div class="form-group">
			<label for="first_name"></label>
			<input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<label for="last_name"></label>
			<input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<label for="phone"></label>
			<input type="tel" name="phone" id="phone" placeholder="Phone" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<label for="gender">gender</label>
			<select name="gender" id="gender" class="form-field form-field-lg">
				<option value="" disabled selected>Select gender...</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="email"></label>
			<input type="text" name="email" placeholder="Email Address" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<label for="password"></label>
			<input type="password" name="password" id="password" placeholder="Password" class="form-field form-field-lg">
		</div>
		
		<div class="form-group">
			<button type="submit" class="fx-btn fx-btn-primary fx-btn-lg btn-submit">
				<span class="btn-text">Register</span>
				<i class="far fa-spinner-third fa-spin btn-loader" style="display: none"></i>
			</button>
		</div>
	</form>
	
	@push('scripts')
		<script src="{{ asset('assets/js/register.js') }}" type="module"></script>
	@endpush
</hodos:auth-layout>

