<?php
namespace Drupal\cse_selector\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Form\FormStateInterface;


class SearchForm extends FormBase {
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('cse_selector.settings');
    $cse_search_type = $config->get('cse_selector_default_search_type');
    $cse_url_text = $config->get('cse_selector_url_text');
    $cse_results_page_name = $config->get('cse_selector_results_page_name');

    $form['#method'] = 'get';
    $form['q'] = array(
      '#type' => 'hidden',
      '#default_value' => $cse_results_page_name,
    );
    $form['search'] = array(
      '#type' => 'fieldset',
      '#title' => t('')
    );
    $form['search'] = array(
      '#type' => 'container',
      '#attributes' => array(
        'class' => array(
          'container-inline'
        )
      )
    );
    $form['search']['search_broadness'] = array(
      '#type' => 'hidden',
    );
    if (array_key_exists('search_broadness', drupal_get_query_parameters())) {
      $form['search']['search_broadness']['#default_value'] = drupal_get_query_parameters()['search_broadness'];

    } else {
      $form['search']['search_broadness']['#default_value'] = $cse_search_type;
    }
    $form['search'][$cse_url_text] = array(
      '#type' => 'textfield',
      '#attributes' => array('placeholder' => t('Search')),
    );
    if (array_key_exists($cse_url_text, drupal_get_query_parameters())) {
          $form['search'][$cse_url_text]['#default_value'] = drupal_get_query_parameters()[$cse_url_text];
    } else {
      $form['search'][$cse_url_text]['#default_value'] = '';
    }
    $form['search']['search_submit']  = array(
      '#type' => 'submit',
    );
    return $form;
  }
}
