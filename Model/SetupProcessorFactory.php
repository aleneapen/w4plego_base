<?php

namespace W4PLEGO\CmsUpgrade\Model;

use W4PLEGO\CmsUpgrade\Model\Cms\Block;
use W4PLEGO\CmsUpgrade\Model\Cms\Page;
use W4PLEGO\CmsUpgrade\Model\Entity\Config;

/**
 * Class SetupProcessorFactory
 *
 * @package W4PLEGO\CmsUpgrade\Model
 */
class SetupProcessorFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Factory constructor
     *
     * SetupFactory constructor.
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    /**
     * @param string $type
     * @return bool|mixed
     */
    public function makeProcessor($type)
    {
        return $this->_objectManager->get(
            'W4PLEGO\CmsUpgrade\Console\Command\Processor\\' . ucfirst($type) . 'Processor'
        );
    }
}
