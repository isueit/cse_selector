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
