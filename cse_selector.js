//Basic JS to use google custom search
function cse_selector_js_request() {
  var cx = Drupal.settings;
  alert(cx);
  var gcse = document.createElement('script');
  gcse.type = 'text/javascript'; gcse.async = true;
  gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
}
cse_selector_js_request();
//This function is also called when there is an ajax on_change event for the search wideness radios
