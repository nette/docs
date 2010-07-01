var NetteAjax = new Class({

	Extends : Request.JSON,

	updateSnippet : function(id, html) {
		document.id(id).set('html', html);
	},
	
	onSuccess: function(payload) {
		this.parent(payload);
		//redirect
		if (payload.redirect) {
			window.location.href = payload.redirect;
			return;
		}
		//snippet
		if (payload.snippets) {
			for (var i in payload.snippets) {
				this.updateSnippet(i, payload.snippets[i]);
			}
		}
	}
	
});

window.addEvent('domready', function() {
	$$('.ajax').addEvent('click', function(event){
		event.stop();
		new NetteAjax({
			url: this.get('href')
		}).send();
	});
});

/* with Mootools Event.Delegation
window.addEvent('domready', function() {
	document.id('main').addEvent('click:relay(.ajax)', function(event) {
		event.stop();
		new NetteAjax({
			url: this.get('href')
		}).send();
	});
});
*/