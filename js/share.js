function getTaringaButtons() {
	var buttons = document.getElementsByTagName('t:sharer'),
		url,
		body,
		force,
		layout,
		layoutSizes = {
			'big': [ 74, 58 ],
			'big_new': [ 64, 62 ],
			'medium_simple': [ 76, 20 ],
			'medium_plus': [ 94, 20 ],
			'medium_counter': [ 105, 23 ],
			'small': [ 21, 20 ],
			'default': [ 105, 23 ]
		},
		iframe;
	for (var i = 0, c = buttons.length; i < c; ++i) {
		url = buttons[0].getAttribute('data-url') || location.href;
		layout = buttons[0].getAttribute('data-layout') || 'default';
		if (!layoutSizes[layout]) {
			layout = 'default';
		}
		body = buttons[0].getAttribute('data-body') || '';
		force = buttons[0].getAttribute('data-force') || '';
		iframe = document.createElement('iframe');
		iframe.setAttribute('src', '//www.taringa.net/isharebutton.php?url=' + url + '&layout=' + layout + '&body=' + body + '&force=' + force);
		iframe.setAttribute('scrolling', 'no');
		iframe.setAttribute('frameborder', 0);
		iframe.setAttribute('allowtransparency', true);
		iframe.style.border = 0;
		iframe.style.overflow = 'hidden';
		iframe.style.width = layoutSizes[layout][0] + 'px';
		iframe.style.height = layoutSizes[layout][1] + 'px';
		buttons[0].parentNode.insertBefore(iframe, buttons[0]);
		buttons[0].parentNode.removeChild(buttons[0]);
	}
}


document.onreadystatechange = function () {
	if (document.readyState === "complete") {
		getTaringaButtons();
	}
}

getTaringaButtons(); // hurry up button!