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
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\ResultsForm');
    return $form;
  }
}
