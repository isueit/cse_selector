<?php

namespace Drupal\cse_selector\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/*
 * Provides a "Search Block" plugin
 *
 * @Block(
 *   id = 'search_block',
 *   admin_label = @Translation("Search Bar Block"),
 *   category = @Translation("Search"),
 * )
 */

class SearchBlock extends BlockBase {
  /*
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\SearchForm');
    return $form;
  }
}