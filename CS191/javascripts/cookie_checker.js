/**
* Function that check whether cookies are enabled in user's browser
*
*
*/
function cookies_are_enabled() {

	var TEST_COOKIE = 'crs_test';
	$.cookie(TEST_COOKIE, true);
	if($.cookie(TEST_COOKIE)) {
		$.cookie(TEST_COOKIE, null);
		return true;
	} else {
		return false;
	}
}