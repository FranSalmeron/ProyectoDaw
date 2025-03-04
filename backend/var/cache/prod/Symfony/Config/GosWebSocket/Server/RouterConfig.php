<?php

namespace Symfony\Config\GosWebSocket\Server;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Router'.\DIRECTORY_SEPARATOR.'ResourcesConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RouterConfig 
{
    private $resources;
    private $_usedProperties = [];
    
    /**
     * @return \Symfony\Config\GosWebSocket\Server\Router\ResourcesConfig|$this
     */
    public function resources(mixed $value = []): \Symfony\Config\GosWebSocket\Server\Router\ResourcesConfig|static
    {
        $this->_usedProperties['resources'] = true;
        if (!\is_array($value)) {
            $this->resources[] = $value;
    
            return $this;
        }
    
        return $this->resources[] = new \Symfony\Config\GosWebSocket\Server\Router\ResourcesConfig($value);
    }
    
    public function __construct(array $value = [])
    {
        if (array_key_exists('resources', $value)) {
            $this->_usedProperties['resources'] = true;
            $this->resources = array_map(function ($v) { return \is_array($v) ? new \Symfony\Config\GosWebSocket\Server\Router\ResourcesConfig($v) : $v; }, $value['resources']);
            unset($value['resources']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['resources'])) {
            $output['resources'] = array_map(function ($v) { return $v instanceof \Symfony\Config\GosWebSocket\Server\Router\ResourcesConfig ? $v->toArray() : $v; }, $this->resources);
        }
    
        return $output;
    }

}
