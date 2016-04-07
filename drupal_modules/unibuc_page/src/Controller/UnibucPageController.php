<?php
/**
 * Created by PhpStorm.
 * User: claudia
 * Date: 4/6/16
 * Time: 11:58 PM
 */

namespace Drupal\unibuc_page\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UnibucPageController extends ControllerBase {

  public function basic() {
    return array(
      '#markup' => $this->t('This is my first drupal custom page!'),
    );
  }

  public function restricted() {
    return array(
      '#markup' => '<p>' . $this->t('This is a page with restricted access.') . '</p>',
    );
  }

  public function arguments($first, $second) {
    // Make sure you don't trust the URL to be safe! Always check for exploits.
    if (!is_numeric($first) || !is_numeric($second)) {
      // We will just show a standard "access denied" page in this case.
      throw new AccessDeniedHttpException();
    }

    $list[] = $this->t("First number was @number.", array('@number' => $first));
    $list[] = $this->t("Second number was @number.", array('@number' => $second));
    $list[] = $this->t('The total was @number.', array('@number' => $first + $second));

    $render_array['page_example_arguments'] = array(
      // The theme function to apply to the #items
      '#theme' => 'item_list',
      // The list itself.
      '#items' => $list,
      '#title' => $this->t('Argument Information'),
    );
    return $render_array;
  }
}