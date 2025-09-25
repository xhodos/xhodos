const loginForm = fx('#login-form');

loginForm.off('submit').upon('submit', e => {
	e.preventDefault();
	loginForm.handleFormSubmit({timeout: 20000, handleError: true, beforeSend: () => loginForm.toggleFormSubmitButtonState()}).then(response => {
		if (response.status === 308) {
			fx.modal({
				title: 'Operation Successful',
				type: 'success',
				content: response.JSON.message,
			});
			setTimeout(() => location.href = response.JSON.redirect, 1500);
		} else
			loginForm.toggleFormSubmitButtonState().then(() => console.warn(response));
	}).catch(error => loginForm.toggleFormSubmitButtonState(false).then(() => console.log(error)));
}).formValidator.init({config: {useDefaultStyling: true}});
