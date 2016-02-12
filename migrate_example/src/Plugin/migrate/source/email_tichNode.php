<?php

/**
 * @file
 * Contains \Drupal\migrate_example\Plugin\migrate\source\email_tichNode.
 */

namespace Drupal\migrate_example\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;

/**
 * Source plugin for email_tich content.
 *
 * @MigrateSource(
 *   id = "email_tich_node"
 * )
 */
class email_tichNode extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    /**
     * An important point to note is that your query *must* return a single row
     * for each item to be imported. Here we might be tempted to add a join to
     * migrate_example_beer_topic_node in our query, to pull in the
     * relationships to our categories. Doing this would cause the query to
     * return multiple rows for a given node, once per related value, thus
     * processing the same node multiple times, each time with only one of the
     * multiple values that should be imported. To avoid that, we simply query
     * the base node data here, and pull in the relationships in prepareRow()
     * below.
     */
    $query = $this->select('migrate_example_beer_node', 'b')
                 ->fields('b', ['id', 'title', 'dt_created','liontiger','article']);
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'id' => $this->t('Beer ID'),
      'title' => $this->t('Name of title'),
      'dt_created' => $this->t('Full description of the dt_created'),
      'liontiger' => $this->t('Full description of the liontiger'),
      'article' => $this->t('Full description of the article'),

      
    ];

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [
      'id' => [
        'type' => 'integer',
        'alias' => 'b',
      ],
    ];
  }

  
}
