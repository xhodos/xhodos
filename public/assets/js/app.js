import {dynamicChatBox, isSmallScreen, menuToggleActions} from './ui-events.js';

const token = fx('meta[name="csrf-token"]').attrib('content');

/*fx('form').off().upon('submit', function (e) {
	e.preventDefault();
	const form = fx(e.currentTarget);
	
	form.formValidator.handleFormSubmit().then(result => {
		console.log(result);
	}).catch(error => console.log(error));
});*/

let chatSearch = '';

fx('#new_chat').off().upon({
	input: function (event) {
		chatSearch = event.target.value;
		const searchInput = fx(event.currentTarget);
		const searchRoute = searchInput.dataAttrib('route');
		
		fx.fetch({
			uri: searchRoute,
			method: 'POST',
			data: {query: chatSearch, csrf_token: token},
			onComplete: (response, status) => {
				response = response.responseJSON;
				if (status > 199 && status < 300)
					fx('#new-chat-result-wrapper').insertHTML(response.data);
			}
		});
	}
});

fx(document).off('click').upon('click', function (e) {
	const target = fx(e.target);
	if (!target.matchSelector('.contextmenu') && !target.parents('.contextmenu').length)
		fx('.contextmenu').length && fx('.contextmenu').removeClass('active');
	
	if (target.matchSelector('.dropdown')) {
		fx('.dropdown-menu').style({display: 'none'});
		
		const dropdownMenu = fx('.dropdown-menu', target);
		
		if (dropdownMenu.length)
			if (dropdownMenu.style('display') === 'none')
				dropdownMenu.style({display: 'block'});
			else
				dropdownMenu.style({display: 'none'});
	} else {
		// fx('.dropdown-menu').each(menu => menu.style())
		fx('.dropdown-menu').style({display: 'none'});
	}
	
	if (!target.matchSelector('.left-menu.active') && !target.parents('.left-menu.active').length) {
		if (isSmallScreen() && fx('.left-menu.active').style('display') !== 'none') {
			fx('.left-menu-toggler').disable();
			fx('.left-menu.active').slideoutleft().then(menu => {
				menu.putClass('opened');
				fx('.left-menu-toggler').disable(false);
			})
		}
	}
});

const chatForm = fx('#chat-form');
const chatContent = fx('#chat-content');
const chatSubmit = fx('button[form="chat-form"]');

if (!chatContent.value()?.length || chatContent.value() === '\n')
	chatSubmit.disable();
chatContent.off().upon('input', function (event) {
	if (chatContent.value())
		if (chatContent.value() === '\n')
			chatSubmit.disable();
		else
			chatSubmit.disable(false);
	else
		chatSubmit.disable();
});


chatForm.off().upon('submit', function (event) {
	event.preventDefault();
	const message = chatContent.value() || '';
	
	if (message.length && message !== '\n') {
		chatForm.handleFormSubmit({
			data: {
				message: message,
			},
		}).then(response => {
			console.log(response);
		});
	}
})

window.onresize = () => {
	dynamicChatBox();
	menuToggleActions();
}

let searchQuery = fx("#chats");
searchQuery.off().upon('input', function (e) {
	const context = fx('.left-menu.active .chat-friend');
	context.each(function (el) {
		const result = el.innerText.toLowerCase().match(searchQuery.value()?.toLowerCase());
		result?.length ? el.fadein(0, 'flex') : el.fadeout(0);
	});
});

dynamicChatBox();
menuToggleActions();
