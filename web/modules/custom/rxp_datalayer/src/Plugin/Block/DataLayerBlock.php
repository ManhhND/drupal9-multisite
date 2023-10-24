<?php

namespace Drupal\rxp_datalayer\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'DataLayer' Block.
 *
 * @Block(
 *   id = "rxp_datalayer_block",
 *   admin_label = @Translation("DataLayer Block"),
 *   category = @Translation("DataLayer Block"),
 * )
 */
class DataLayerBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The node metadata manager service.
   * 
   * @var \Drupal\rxp_datalayer\NodeMetadataManager
   */
  protected $nodeMetadataManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );

    $instance->nodeMetadataManager = $container->get('rxp_datalayer.metadata');

    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $datalayer = json_encode($this->nodeMetadataManager->getNodeMetadata());

    return [
      '#markup' => $datalayer,
    ];
  }

}