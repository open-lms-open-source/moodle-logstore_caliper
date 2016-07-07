<?php

namespace IMSGlobal\Caliper;

use \IMSGlobal\Caliper\events\Event;
use \IMSGlobal\Caliper\entities\Entity;

class Sensor {
    /** @var Client[] */
    private $clients;
    /** @var string */
    private $id;

    /** @param string $id */
    public function __construct($id) {
        if (!extension_loaded('json')) {
            throw new \Exception('Caliper requires the PHP "json" extension.');
        }
        if (!is_string($id)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->setId($id);
    }

    /** @return string id */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $id
     * @return $this|Sensor
     */
    public function setId($id) {
        if (! is_string($id)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->id = $id;
        return $this;
    }

    /**
     * @param string $key
     * @param Client $client
     * @return $this|Sensor
     */
    public function registerClient($key, Client $client) {
        if (!is_string($key)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        $this->clients[$key] = $client;
        return $this;
    }

    /**
     * @param string $key
     * @return $this|Sensor
     */
    public function unregisterClient($key) {
        if (!is_string($key)) {
            throw new \InvalidArgumentException(__METHOD__ . ': string expected');
        }

        unset($this->clients[$key]);
        return $this;
    }

    /**
     * Send learning events
     * @param Sensor $sensor
     * @param Event|Event[] $events
     */
    public function send(Sensor $sensor, $events) {
        $this->checkClients();

        if (!is_array($events)) {
            $events = [$events];
        }

        foreach ($events as $anEvent) {
            if (!($anEvent instanceof Event)) {
                throw new \InvalidArgumentException(__METHOD__ . ': array of ' . Event::className() . ' expected');
            }
        }

        foreach ($this->clients as $client) {
            $client->send($sensor, $events);
        }
    }

    /**
     * Ensures that some clients are set. Throws an exception when not set.
     */
    private function checkClients() {
        if ($this->clients == null) {
            throw new \RuntimeException(
                'registerClient() must be called before describe() or send()'
            );
        }
    }

    /**
     * Describe entities
     * @param Sensor $sensor
     * @param Entity|Entity[] $entities
     */
    public function describe(Sensor $sensor, $entities) {
        $this->checkClients();

        if (!is_array($entities)) {
            $entities = [$entities];
        }

        foreach ($entities as $anEntity) {
            if (!($anEntity instanceof Entity)) {
                throw new \InvalidArgumentException(__METHOD__ . ': array of ' . Entity::className() . ' expected');
            }
        }

        foreach ($this->clients as $client) {
            $client->describe($sensor, $entities);
        }
    }
}
