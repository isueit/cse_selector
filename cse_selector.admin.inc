<?php

/*
 * Implements hook_settings for Custom search
 */
 function cse_selector_settings() {
   $form['cse_selector'] = array(
     '#type' => 'fieldset',
     '#title' => t('Configure Google Custom Search Engine'),
   );

   $form['cse_selector']['cse_selector_id_key'] = array(
     '#type' => 'textfield',
     '#title' => t('Google Custom Search Engine ID'),
     '#default_value' => variable_get('cse_selector_id_key'),
     '#description' => t('This is the Search Engine ID for the Google Custom Search Engine.'),
   );
   $form['cse_selector']['cse_selector_narrow_search_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Narrow Search Text'),
     '#default_value' => variable_get('cse_selector_narrow_search_text'),
     '#description' => t('This is the string that will be displayed with the radio to select narrow search. The sitename was automatically added to the end when the module was installed. Current site name: \'') . variable_get('site_name') . t('\''),
   );
   $form['cse_selector']['cse_selector_narrow_search_query'] = array(
     '#type' => 'textfield',
     '#title' => t('Query String for Narrow Search'),
     '#default_value' => variable_get('cse_selector_narrow_search_query'),
     '#description' => t('This is the string that will be used for the \'as_sitesearch\' parameter for Google Custom Search. The current base path was automatically added to the end when the module was installed. Current site path: \'') . base_path() . t('\''),
   );
   $form['cse_selector']['cse_selector_wide_search_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Wide Search Text'),
     '#default_value' => variable_get('cse_selector_wide_search_text'),
     '#description' => t('This is the string that will be displayed with the radio to select wide search.'),
   );
   $form['cse_selector']['cse_selector_default_search_type'] = array(
     '#type' => 'radios',
     '#title' => t('Default Search Behavior'),
     '#options' => array(
       'narrow' => t('Narrow'),
       'wide' => t('Wide'),
     ),
     '#default_value' => variable_get('cse_selector_default_search_type'),
     '#description' => t('This selects the default behavior of the custom search, either narrow or wide.'),
   );
   $form['cse_selector']['cse_selector_url_text'] = array(
     '#type' => 'textfield',
     '#title' => t('Query Url Text'),
     '#default_value' => variable_get('cse_selector_url_text'),
     '#description' => t('This is the parameter that will be used in the URL as the query for Google Custom Search'),
   );
   $form['cse_selector']['cse_selector_results_page_name'] = array(
     '#type' => 'textfield',
     '#title' => t('Search Results Page Name'),
     '#default_value' => variable_get('cse_selector_results_page_name'),
     '#description' => t('This will be the name of the page that the results will be displayed on.')
   );
   return system_settings_form($form);
 }
