<?php

namespace Drupal\cse_selector\Controller;
use Drupal\Core\Controller\ControllerBase;

/*
 * Provides a search results response for module route to search-results
 */

class ResultsController extends ControllerBase {
  /*
   * @return array
   *  Returns form for results
   */
  public function resultsPage() {
    \Drupal::service('page_cache_kill_switch')->trigger();
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\ResultsForm');
    $form['form_id']['#access'] = FALSE;
    $form['form_build_id']['#access'] = FALSE;
    $form['form_token']['#access'] = FALSE;
    //Check for XSS that may be possible with this solution
    $searchbroadness = preg_replace("/[^a-z]+/","",\Drupal::request()->query->get('search_broadness'));
    $form['cse_div'] = [
      '#type' => 'inline_template',
      '#template' => '<div class="gcse-searchresults-only" data-resultsUrl="https://www.extension.iastate.edu{{ basePath }}" data-queryParameterName="{{ queryParam }}" {{ asSite }}></div>',
      '#context' => array(
        'basePath' => base_path(),
        'queryParam' => (\Drupal::config('cse_selector.settings')->get('cse_selector_url_text')),
        'asSite' => ((array_key_exists('search_broadness' , \Drupal::request()->query->all()) && $searchbroadness == 'narrow') ? 'data-as_sitesearch=' . \Drupal::config('cse_selector.settings')->get('cse_selector_narrow_search_query') : '')
      ),
    ];
    return $form;
  }
}
