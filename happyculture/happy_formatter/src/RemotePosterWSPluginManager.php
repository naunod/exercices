<?php

/**
 * @file
 * Contains \Drupal\happy_formatter\RemotePosterWSPluginManager.
 */

namespace Drupal\happy_formatter;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides a plugin manager to get remote poster.
 *
 * @see \Drupal\happy_formatter\RemotePosterWSPluginBase
 * @see \Drupal\happy_formatter\RemotePosterWSInterface
 * @see plugin_api
 */
class RemotePosterWSPluginManager extends DefaultPluginManager {

  /**
   * Constructs a new RemotePosterWSPluginManager.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations,
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/RemotePosterWS', $namespaces, $module_handler, 'Drupal\happy_formatter\RemotePosterWSInterface', 'Drupal\happy_formatter\Annotation\RemotePosterWS');

    $this->alterInfo('remote_poster_info');
    $this->setCacheBackend($cache_backend, 'remote_poster_plugins');
  }

}
