<?php

namespace Drupal\rxp_extended_datalayer;

use Drupal\rxp_datalayer\NodeMetadataManager;

class ExtendedDatalayer extends NodeMetadataManager {

  /**
   * {@inheritdoc}
   */
  public function getNodeMetadata() {
    $result = parent::getNodeMetadata();
    $node = $this->currentRouteMatch->getParameter('node');
    if ($node->hasField('field_tags')) {
      foreach ($node->field_tags->getValue() as $value) {
        $tag = $this->entityTypeManager->getStorage('taxonomy_term')->load($value['target_id']);
        $result['tags'][] = [
          'tagName' => $tag->label(),
        ];
      }
    }
    return $result;
  }
}
