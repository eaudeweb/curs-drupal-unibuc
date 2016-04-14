<?php
namespace Drupal\unibuc_rest\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides an example REST resource.
 *
 * @RestResource(
 *   id = "unibuc_rest",
 *   label = @Translation("Example REST"),
 *   uri_paths = {
 *     "canonical" = "foo"
 *   }
 * )
 */
class ExampleResource extends ResourceBase {
    public function get() {
        return new ResourceResponse(array('foo' => 'bar'));
    }
}