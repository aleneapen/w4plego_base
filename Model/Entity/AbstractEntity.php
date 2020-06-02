<?php

namespace W4PLEGO\CmsUpgrade\Model\Entity;

use W4PLEGO\CmsUpgrade\Model\Cms\AbstractEntity as CmsAbstractEntity;

/**
 * Class TransactionEmail
 *
 * @package W4PLEGO\CmsUpgrade\Model\Cms
 */
class AbstractEntity extends CmsAbstractEntity
{
    /**
     * @var array
     */
    protected $_itemsIds = [];

    /**
     * @param array $ids
     * @return $this
     */
    public function setItemsIds(array $ids)
    {
        $this->_itemsIds = $ids;
        return $this;
    }

    /**
     * @return \Magento\Framework\DataObject
     */
    public function generate()
    {
        return $this->_generator->processUpgradeScript($this->_itemsIds);
    }
}
