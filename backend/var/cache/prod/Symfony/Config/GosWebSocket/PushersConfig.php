<?php

namespace Symfony\Config\GosWebSocket;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Pushers'.\DIRECTORY_SEPARATOR.'AmqpConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Pushers'.\DIRECTORY_SEPARATOR.'WampConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PushersConfig 
{
    private $amqp;
    private $wamp;
    private $_usedProperties = [];
    
    /**
     * @return \Symfony\Config\GosWebSocket\Pushers\AmqpConfig|$this
     */
    public function amqp(mixed $value = []): \Symfony\Config\GosWebSocket\Pushers\AmqpConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['amqp'] = true;
            $this->amqp = $value;
    
            return $this;
        }
    
        if (!$this->amqp instanceof \Symfony\Config\GosWebSocket\Pushers\AmqpConfig) {
            $this->_usedProperties['amqp'] = true;
            $this->amqp = new \Symfony\Config\GosWebSocket\Pushers\AmqpConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "amqp()" has already been initialized. You cannot pass values the second time you call amqp().');
        }
    
        return $this->amqp;
    }
    
    /**
     * @return \Symfony\Config\GosWebSocket\Pushers\WampConfig|$this
     */
    public function wamp(mixed $value = []): \Symfony\Config\GosWebSocket\Pushers\WampConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['wamp'] = true;
            $this->wamp = $value;
    
            return $this;
        }
    
        if (!$this->wamp instanceof \Symfony\Config\GosWebSocket\Pushers\WampConfig) {
            $this->_usedProperties['wamp'] = true;
            $this->wamp = new \Symfony\Config\GosWebSocket\Pushers\WampConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "wamp()" has already been initialized. You cannot pass values the second time you call wamp().');
        }
    
        return $this->wamp;
    }
    
    public function __construct(array $value = [])
    {
        if (array_key_exists('amqp', $value)) {
            $this->_usedProperties['amqp'] = true;
            $this->amqp = \is_array($value['amqp']) ? new \Symfony\Config\GosWebSocket\Pushers\AmqpConfig($value['amqp']) : $value['amqp'];
            unset($value['amqp']);
        }
    
        if (array_key_exists('wamp', $value)) {
            $this->_usedProperties['wamp'] = true;
            $this->wamp = \is_array($value['wamp']) ? new \Symfony\Config\GosWebSocket\Pushers\WampConfig($value['wamp']) : $value['wamp'];
            unset($value['wamp']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['amqp'])) {
            $output['amqp'] = $this->amqp instanceof \Symfony\Config\GosWebSocket\Pushers\AmqpConfig ? $this->amqp->toArray() : $this->amqp;
        }
        if (isset($this->_usedProperties['wamp'])) {
            $output['wamp'] = $this->wamp instanceof \Symfony\Config\GosWebSocket\Pushers\WampConfig ? $this->wamp->toArray() : $this->wamp;
        }
    
        return $output;
    }

}
