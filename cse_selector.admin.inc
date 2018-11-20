<?php

/*
 * Implements hook_settings for Custom search
 */
 function cse_selector_settings() {
   $form['cse_selector'] = array(
     '#type' => 'fieldset',
     '#title' => t('Configure Google Custom Search Engine'),
   );

   $form['cse_selector']['cse_selector_api_key'] = array(
     '#type' => 'textfield',
     '#title' => t('Google Custom Search API Key'),
     '#default_value' => variable_get('cse_selector_api_key', 'this_is_a_test'),
     '#description' => t('This is the API key for the Google Custom Search Engine.'),
   );
   $form['cse_selector']['cse_selector_id_key'] = array(
     '#type' => 'textfield',
     '#title' => t('Google Custom Search Engine ID'),
     '#default_value' => variable_get('cse_selector_id_key', '014153082229948236703:4fobzs0gqdo'),
     '#description' => t('This is the Search Engine ID for the Google Custom Search Engine.'),
   );
   $form['cse_selector']['cse_narrow_search_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Narrow Search Text'),
     '#default_value' => variable_get('cse_narrow_search_text', 'Search <Site Name>'),
     '#description' => t('This is the string that will be displayed with the radio to select narrow search. Sitename is automatically replaced with the current site. Current site name: \'') . variable_get('site_name') . t('\''),
   );
   $form['cse_selector']['cse_narrow_search_query'] = array(
     '#type' => 'textfield',
     '#title' => t('Query String for Narrow Search'),
     '#default_value' => variable_get('cse_narrow_search_query', 'https://www.extension.iastate.edu<<$base_path>>'),
     '#description' => t('This is the string that will be used for the \'as_sitesearch\' parameter for Google Custom Search. \'$base_path\' will be automatically replaced with the base path of the current site. Current site path: \'') . base_path() . t('\''),
   );
   $form['cse_selector']['cse_wide_search_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Wide Search Text'),
     '#default_value' => variable_get('cse_wide_search_query', 'Search All ISU Extension and Outreach'),
     '#description' => t('This is the string that will be displayed with the radio to select wide search.'),
   );
   $form['cse_selector']['cse_default_search_type'] = array(
     '#type' => 'radios',
     '#title' => t('Default Search Behavior'),
     '#options' => array(
       'narrow' => t('Narrow'),
       'wide' => t('Wide'),
     ),
     '#default_value' => variable_get('cse_default_search_type', 'narrow'),
     '#description' => t('This selects the default behavior of the custom search, either narrow or wide.'),
   );
   $form['cse_selector']['cse_url_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Query Url Text'),
     '#default_value' => variable_get('cse_url_text', 'as_q'),
     '#description' => t('This is the parameter that will be used in the URL as the query for Google Custom Search'),
   );
   $form['cse_selector']['results_page_name'] = array(
     '#type' => 'textfield',
     '#title' => t('Search Results Page Name'),
     '#default_value' => variable_get('results_page_name', 'search_results'),
     '#description' => t('This will be the name of the page that the results will be displayed on.')
   );
   return system_settings_form($form);
 }

/*
 * Validate Form and keep old API key to prevent accidental deletions
 */
function cse_selector_settings_validate($form, &$form_state) {
  $saved_api_key = variable_get('cse_selector_api_key', '');
  $new_api_key = $form_state['values']['cse_selector_api_key'];

  if (empty($new_api_key)) {
    $form_state['values']['cse_selector_api_key'] = $saved_api_key;
  }
}
