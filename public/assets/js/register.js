const registerForm = fx('#register-form');

registerForm.off('submit').upon('submit', e => {
	e.preventDefault();
	registerForm.handleFormSubmit({timeout: 20000, handleError: true, beforeSend: () => registerForm.toggleFormSubmitButtonState()}).then(response => {
		if (response.status === 308) {
			fx.modal({
				title: 'Operation Successful',
				type: 'success',
				content: response.JSON.message,
			});
			setTimeout(() => location.href = response.JSON.redirect, 1500);
		} else
			registerForm.toggleFormSubmitButtonState().then(() => console.warn(response));
	}).catch(error => registerForm.toggleFormSubmitButtonState(false).then(() => console.log(error)));
}).formValidator.init({config: {useDefaultStyling: true}});
