/**
 * Nella
 *
 * @copyright  Copyright (c) 2006, 2010 Patrik Votoček
 * @license    http://nellacms.com/license  New BSD license
 * @link       http://nellacms.com
 * @category   Nella
 * @package    Nella
 */
var nella = nella || { };

nella.validateInput = function(el) {
	var form = $(el).parents('form');
	if (nette.forms[form.attr('id')]) {
		if (nette.forms[form.attr('id')].validators[$(el).attr('name')]){
			var message = nette.forms[form.attr('id')].validators[$(el).attr('name')](form[0])
			if (message) {
				$(el).after('<p class="error">'+message+'</p>');
			}
		}
	}
}

$(document).ready(function() {
	$('form input').blur(function() {
		$(this).next('.error').remove();
		nella.validateInput(this);
	});
	$('form').attr('onSubmit', null);
	$('form').submit(function() {
		$(this).find('.error').remove();
		$(this).find('input').each(function() {
			nella.validateInput(this);
		});
		if ($(this).find('.error')[0] == null) {
			return true;
		} else {
			return false;
		}
	});
});