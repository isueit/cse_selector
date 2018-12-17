<?php
namespace Drupal\cse_selector\Form;
use Drupal\Core\Form\FormBase;
<<<<<<< HEAD
=======
use Drupal\Core\Form\FormInterface;
>>>>>>> b1a5d2226302c71aba16bc83b72af446a4866593
use Drupal\Core\Form\FormStateInterface;


class SearchForm extends FormBase {
<<<<<<< HEAD
  public function getFormId() {
    return 'search_bar';
  }
=======
>>>>>>> b1a5d2226302c71aba16bc83b72af446a4866593
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = \Drupal::config('cse_selector.settings');
    $cse_search_type = $config->get('cse_selector_default_search_type');
    $cse_url_text = $config->get('cse_selector_url_text');
    $cse_results_page_name = $config->get('cse_selector_results_page_name');
    $get_results = \Drupal::request()->request->all();

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
    if (array_key_exists('search_broadness', $get_results)) {
      $form['search']['search_broadness']['#default_value'] = $get_results['search_broadness'];

    } else {
      $form['search']['search_broadness']['#default_value'] = $cse_search_type;
    }
    $form['search'][$cse_url_text] = array(
      '#type' => 'textfield',
      '#attributes' => array('placeholder' => t('Search test')),
    );
    if (array_key_exists($cse_url_text, $get_results)) {
          $form['search'][$cse_url_text]['#default_value'] = $get_results[$cse_url_text];
    } else {
      $form['search'][$cse_url_text]['#default_value'] = '';
    }
    $form['search']['search_submit']  = array(
      '#type' => 'submit',
    );
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state){}
  public function validateForm(array &$form, FormStateInterface $form_state){}
}
