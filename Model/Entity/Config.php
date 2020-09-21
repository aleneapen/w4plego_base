<?php

namespace W4PLEGO\CmsUpgrade\Model\Entity;

use W4PLEGO\CmsUpgrade\Model\GeneratorInterface;
use W4PLEGO\CmsUpgrade\Model\ConfigGenerator;

/**
 * Class AbstractEntity
 *
 * @package W4PLEGO\CmsUpgrade\Model
 */
class Config implements GeneratorInterface
{
    const ENTITY_TYPE = 'config';

    /** @var ConfigGenerator */
    protected $_generator = null;

    /**
     * @var array
     */
    protected $_params = [];

    /**
     * @param ConfigGenerator $generator
     */
    public function __construct(ConfigGenerator $generator)
    {
        $this->_generator = $generator;
        $this->_generator->setGenerateEntity($this);
    }

    /**
     * @return array
     */
    public function getUpgradeFields()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getEntityType()
    {
        return static::ENTITY_TYPE;
    }

    /**
     * @return mixed
     */
    public function generate()
    {
        return $this->_generator->processUpgradeScript($this->_params);
    }

    /**
     * @param array $params
     * @return $this
     */
    public function setParams(array $params)
    {
        $this->_params = $params;

        return $this;
    }
}
