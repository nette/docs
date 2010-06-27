/**
 * JNLFV - jQuery Nette Live Form Validator
 *
 * @copyright  Copyright (c) 2006, 2010 Patrik Votoček
 * @license    New BSD
 * @link       addons.nette.org/cs/jquery-nette-live-form-validator
 * @package    Nette
 * @version    1.2 
 */
var nette = nette || { };

nette.validateEntity = function(el) {
	var form = $(el).parents('form');
	if (nette.forms != null && nette.forms[form.attr('id')]) {
		if (nette.forms[form.attr('id')].validators[$(el).attr('name')]){
			var message = nette.forms[form.attr('id')].validators[$(el).attr('name')](form[0])
			if (message) {
				$(el).after('<p class="error">'+message+'</p>');
				return false;
			}
		}
	}
	return true;
}

$(document).ready(function() {
	$('form input, form select, form textarea').live('blur', function() {
		$(this).next('.error').remove();
		nette.validateEntity(this);
	});
	$('form').attr('onSubmit', null).submit(function() {
		if (nette.forms == null || (nette.forms != null && nette.forms[$(this).attr('id')] == null))
			return true;

		var el = null;
		$(this).find('.error').remove();
		$(this).find('input, select, textarea').each(function() {
			res = nette.validateEntity(this);
			if (res == false && el == null) el = this;
		});
		if (el != null) {
			$(el).focus();
			return false;
		} else {
			return true;
		}
	});
});