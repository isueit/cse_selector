<?php

namespace Drupal\cse_selector\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/*
 * Provides a "Results Block" plugin
 *
 * @block (
 *   id = 'results_block',
 *   admin_label = @Translation("Search Results Block"),
 *   category = @Translation("Search")
 * )
 */

class ResultsBlock extends BlockBase {
  /*
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\ResultsForm');
    return $form;
  }
}
