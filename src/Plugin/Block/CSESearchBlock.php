<?php
/*
 * @file
 * Contains \Drupal\cse_selector\Plugin\Block\CSESearchBlock.
 */
namespace Drupal\cse_selector\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/*
 * Provides a "CSESearchBlock" Block.
 *
 * @Block(
 *  id = 'cse_search_block',
 *  admin_label = @Translation("CSE search block"),
 *  category = @Translation("Search")
 * )
 */
class CSESearchBlock extends BlockBase {
  /*
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\cse_selector\Form\CSESearchForm');
    $form['form_id']['#access'] = FALSE;
    $form['form_build_id']['#access'] = FALSE;
    $form['form_token']['#access'] = FALSE;
    return $form;
  }
  /*
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account, $return_as_object = FALSE) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }
  /*
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return 0;
  }
}
