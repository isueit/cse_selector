<?php
namespace Drupal\cse_selector\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ResultsForm extends FormInterface {
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('cse_selector.settings');
    $cse_id_key = $config->get('cse_selector_id_key');
    $cse_narrow_search_text = $config->get('cse_selector_narrow_search_text');
    $cse_narrow_search_query = $config->get('cse_selector_narrow_search_query');
    $cse_wide_search_text = $config->get('cse_selector_wide_search_text');
    $cse_search_type = $config->get('cse_selector_default_search_type');
    $cse_url_text = $config->get('cse_selector_url_text');
    $cse_results_page_name = $config->get('cse_selector_results_page_name');

    $form['#method'] = 'get';
    $form['search']['search_broadness'] = array(
      '#type' => 'radios',
      '#options' => array(
        'narrow' => t($cse_narrow_search_text),
        'wide' => t($cse_wide_search_text),
      ),
      '#attributes' => array('onchange' => 'form.submit("cse_selector_results_form")'),
    );
    if (array_key_exists('search_broadness', drupal_get_query_parameters())) {
      $form['search']['search_broadness']['#default_value'] = drupal_get_query_parameters()['search_broadness'];
    } else {
      $form['search']['search_broadness']['#default_value'] = $cse_search_type;
    }
    if (array_key_exists($cse_url_text, drupal_get_query_parameters())) {
      $form['search'][$cse_url_text] = array(
        '#type' => 'hidden',
        '#default_value' => drupal_get_query_parameters()[$cse_url_text],
      );
    }
    $form['search']['search_submit']  = array(
      '#type' => 'submit',
      '#value' => t('Search'),
    );
    //Loads external JS file to connect with google api
    $form['#attached']['library'][] = 'cse_selector/cse_selector_results';

    $block = '';
    $block .= '<script class="cse_script">
      var cx="' . $cse_id_key . '";
    document.onload = cse_selector_js_request(); </script>';
    $block .= '<div class="gcse-searchresults-only"';
    if (array_key_exists('search_broadness', drupal_get_query_parameters()) && drupal_get_query_parameters()['search_broadness'] == 'narrow') {
      $block .= ' data-as_sitesearch="' . $cse_narrow_search_query . '"';
    }
    $block .= ' data-resultsUrl="https://www.extension.iastate.edu' . base_path() . $cse_results_page_name . '"' ;
    $block .= ' data-queryParameterName="' . $cse_url_text . '"';
    $block .= '></div>';
    $form['search']['google_results'] = array('#markup' => $block);
     return $form;
  }

}
