<?php
/*
 * @file
 * Contains \Drupal\cse_selector\Plugin\Block\SearchBlock.
 */
namespace Drupal\cse_selector\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/*
 * Provides a "SearchBlock" Block.
 *
 * @Block(
 *  id = 'search_block',
 *  admin_label = @Translation("Search Bar Block"),
 *  category = @Translation("Search"),
 * )
 */
class SearchBlock extends BlockBase {
  /*
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\SearchForm');
    $form['form_id']['#access'] = FALSE;
    $form['form_build_id']['#access'] = FALSE;
    $form['form_token']['#access'] = FALSE;
    return $form;
  }
}
