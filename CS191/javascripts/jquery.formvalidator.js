/**
* JQuery Form Validator Plugin
*
* @author Karl Redrick C. Santos
* @date July 10, 2009
*
*/

/*
* How to use:
* In view (HTML):
* 1. Load JQuery file (jquery*.js).
* 2. Load jquery.formvalidator.js.
* 3. Assign an ID to the form you want to validate (<form id="form-id">).
* 4. Assign classes to the fields you want to validate.
*   For example, if you want to require a field to have a value before submitting
*   the form, assign it to a class named required.
*   E.g. <input type="text" id="txt_username" name="txt_username" title="username" class="required" />
* 5. Assign a title attribute to the field you want to be validated (refer to above example).
* 6. You can assign combinations of classes.
		E.g. E.g. <input type="text" id="txt_username" name="txt_username" title="username" class="required login-format" />
* 7. Here are the list of classes you can assign to a field:
*   a. required - if field cannot be blank.
*   b. alphanumeric - if field must be alphanumeric.
*   c. email - if field must be a valid email address.
*   d. login-format - if field must comply with the valid login format used by CRS.
*/


jQuery.fn.formvalidator = function() {

	/// TODO: Find out more about javascript scoping and passing data between functions.
	var is_validated = true;

	// $(this) refers to the form (sample usage -> $('#form-id').formvalidator())
	$(this).submit(check_fields);
	
	function check_fields() {

		// one-to-one correspondence between classes and functions
		var classes = new Array('required', 'numeric', 'alphanumeric', 'email', 'login-format');
		var functions = new Array(is_required, is_numeric, is_alphanumeric, is_email, is_login_format);

		var i;
		var return_value;

		for(i=0;is_validated && i<classes.length; i++) {
			// $(this) refers to the form element
			$(this).find('.' + classes[i]).each(functions[i]);
		}

		return_value = is_validated;
		is_validated = true;

		return return_value;

	}

	function throw_error(el, message) {
		alert(message);
		// $(this) refers to the input element being checked
		el.focus();
		is_validated = false;
		return false;
	}

	function get_value(el) {
		// $(this) refers to the input element being checked
		return el.val();
	}

	function get_title(el) {
		// $(this) refers to the input element being checked
		return (el.attr('title') != '') ? el.attr('title') : el.attr('name');
	}

	function is_required() {
		var value = get_value($(this));
		// Title's value is that of title attribute.
		var title = get_title($(this));

		if(value == '') {
			switch(this.tagName) {
				case 'SELECT':
					return throw_error($(this), 'Please choose a ' + title + '.');
				default:
					return throw_error($(this), 'Please enter ' + title + '.');
			}
		}

	}

	function is_alphanumeric() {
		var alphanumeric_pattern = /^[a-zA-Z0-9\s]+$/;
		var value = get_value($(this));
		// Title's value is that of title attribute.
		var title = get_title($(this));

		if( ! alphanumeric_pattern.test(value)) {
			return throw_error($(this), title + ' must be alphanumeric.');
		}

	}

	function is_numeric() {
		var numeric_pattern = /^[0-9]+$/;
		var value = get_value($(this));
		// Title's value is that of title attribute.
		var title = get_title($(this));

		if( ! numeric_pattern.test(value)) {
			return throw_error($(this), title + ' must be a number.');
		}

	}

	function is_email() {
		var email_pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
		var value = get_value($(this));
		// Title's value is that of title attribute.
		var title = get_title($(this));
	
		if( ! email_pattern.test(value)) {
			return throw_error($(this), title + ' must be a valid email address.');
		}

	}

	function is_login_format() {
		var login_format_pattern = /^([a-zA-Z])+([a-zA-Z0-9_-])*$/;
		var value = get_value($(this));
		// Title's value is that of title attribute.
		var title = get_title($(this));

		if( ! login_format_pattern.test(value)) {
			return throw_error($(this), title + ' is not a valid login name.');
		}

	}

}