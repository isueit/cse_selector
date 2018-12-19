//Basic JS to use google custom search
document.onload = cse_selector_js_request();
function cse_selector_js_request() {
  var gcse = document.createElement('script');
  gcse.type = 'text/javascript';
  gcse.async = true;
  gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
  var s = document.getElementsByClassName('gcse-searchresults-only')[0];
  s.parentNode.insertBefore(gcse, s);
}
//This function is also called when there is an ajax on_change event for the search wideness radios
