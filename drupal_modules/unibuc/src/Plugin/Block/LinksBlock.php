<?php
/**
 * @file
 * Contains \Drupal\unibuc\Plugin\Block\LinksBlock.
 */
namespace Drupal\unibuc\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;

/**
 * Provides a custom block.
 *
 * @Block(
 *   id = "unibuc_links_block",
 *   admin_label = @Translation("A block that shows some links."),
 *   category = @Translation("Blocks")
 * )
 */
class LinksBlock extends BlockBase implements BlockPluginInterface {

    /**
     * {@inheritdoc}
     */
    public function build() {
      return array(
        '#markup' => $this->t('This is my first Drupal block')
      );
    }
}
