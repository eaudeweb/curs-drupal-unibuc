<?php
namespace Drupal\unibuc_rest\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides an example REST resource.
 *
 * @RestResource(
 *   id = "unibuc_rest_id",
 *   label = @Translation("Example REST with parameters"),
 *   uri_paths = {
 *     "canonical" = "bar/{id}"
 *   }
 * )
 */
class ExampleResourceId extends ResourceBase {
    public function get($id = NULL) {
        if ($id) {
            return new ResourceResponse(array('foo' => 'bar ' . $id));
        }

        return new ResourceResponse(array('foo' => 'bar'));
    }
}