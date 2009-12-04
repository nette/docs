/**
 * AJAX Nette Framwork plugin for Prototype
 *
 * @copyright  Copyright (c) 2009 Martin Hořínek | Hever
 * @license    MIT
 * @link       http://addons.nettephp.com/cs/prototype-ajax
 * @version    0.1
 */

var Nette = {
  callback: function(payload) {
    // redirect
    if (payload.redirect) {
      window.location.href = payload.redirect;
    }

    // snippets
    for (var id in payload.snippets) {
      $(id).update(payload.snippets[id]);
    }
  }
};

Ajax.Responders.register({
  onComplete: function(settings, transport) {
  if(transport.status == 200)
    Nette.callback(transport.responseText.evalJSON(true));
  }
});

document.observe('click', function(e, el) {
  if (el = e.findElement('a.ajax')) {
    e.stop();
    new Ajax.Request(el.href);
  }
});