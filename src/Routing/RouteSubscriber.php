<?php
namespace Drupal\cse_selector\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;
use Drupal\Core\Routing\RoutingEvents;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {
  public static function getSubscribedEvents() {
    $events[RoutingEvents::ALTER] = 'onAlterRoutes';
    return $events;
    debug('getting Subscribed events');
  }
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('cse_selector.cse_selector_search_results')) {
      $route->setPath(\Drupal::config('cse_selector.settings')->get('cse_selector_results_page_name'));
    }
    if ($route = $collection->get('user.logout')) {
      $route->setRequirement('_access', 'FALSE');
    }
  }
}
