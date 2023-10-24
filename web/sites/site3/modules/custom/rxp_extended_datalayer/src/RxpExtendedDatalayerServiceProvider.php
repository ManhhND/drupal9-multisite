<?php

namespace Drupal\rxp_extended_datalayer;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;

/**
 * Modifies the language manager service.
 */
class RxpExtendedDatalayerServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    if ($container->hasDefinition('rxp_datalayer.metadata')) {
      $definition = $container->getDefinition('rxp_datalayer.metadata');
      $definition->setClass('Drupal\rxp_extended_datalayer\ExtendedDatalayer');
    }
  }

}