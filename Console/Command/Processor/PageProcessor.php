<?php

namespace W4PLEGO\CmsUpgrade\Console\Command\Processor;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Cms\Model\Page;
use Magento\Cms\Model\PageFactory;

/**
 * Class PageProcessor
 *
 * @package W4PLEGO\CmsUpgrade\Setup\Processor
 */
class PageProcessor extends CmsProcessor
{
    /**
     * Init
     *
     * @param PageFactory $modelFactory
     */
    public function __construct(PageFactory $modelFactory)
    {
        $this->_modelFactory = $modelFactory;
    }
}
