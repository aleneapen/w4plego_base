<?php


namespace W4PLEGO\CmsUpgrade\Ui\Component\Listing\MassAction;

use Magento\Ui\Component\MassAction;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use W4PLEGO\CmsUpgrade\Helper\Data;

class MassActionCMS extends MassAction
{
    /**
     * @var Data
     */
    protected $_helper;
    protected $authorization;

    public function __construct(
        ContextInterface $context,
        Data $helper,
        $components,
        array $data
    )
    {
        $this->_helper = $helper;
        parent::__construct($context, $components, $data);
    }

    public function prepare()
    {
        parent::prepare();
        $config = $this->getConfiguration();
        if (!$this->_helper->isModuleEnabled()) {
            $allowedActions = [];
            foreach ($config['actions'] as $action) {
                if ('generate' != $action['type']) {
                    $allowedActions[] = $action;
                }
            }
            $config['actions'] = $allowedActions;
        }
        $this->setData('config', (array)$config);
    }
}

