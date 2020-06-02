<?php

namespace W4PLEGO\CmsUpgrade\Model\ResourceModel;

/**
 * Class DataVersion
 *
 * @package W4PLEGO\CmsUpgrade\Model\ResourceModel
 */
class DataVersion extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    const INSTALLED_FILES_TABLE = 'w4plego_cms_upgrade_installed_files';

    /**
     * @var []
     */
    protected $installedFiles;

    /**
     * Model Initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('w4plego_cms_upgrade_data_version', 'id');
    }

    /**
     * @return string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function loadDataVersion()
    {
        $connection = $this->getConnection();
        return $connection->fetchOne(
            $connection->select()
                ->from($this->getMainTable(), 'data_version')
                ->limit(1)
        );
    }

    /**
     * @param string $version
     * @param string $fileName
     * @return int
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function updateDataVersion($version, $fileName = null)
    {
        if ($fileName !== null) {
            $this->installFile($fileName);
        }
        $updatedCount = $this->getConnection()->update($this->getMainTable(), ['data_version' => $version]);
        if (!$updatedCount) {
            $this->getConnection()->delete($this->getMainTable());
            $updatedCount = $this->getConnection()->insert($this->getMainTable(), ['data_version' => $version]);
        }
        return $updatedCount;
    }

    /**
     * @param string $fileName
     * @return int
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function installFile($fileName)
    {
        return $this->getConnection()->insert($this->getTable(self::INSTALLED_FILES_TABLE), ['file' => $fileName]);
    }

    /**
     * @param string $fileName
     * @return bool
     */
    public function isFileInstalled($fileName)
    {
        if ($this->installedFiles === null) {
            $this->installedFiles = [];
            $connection = $this->getConnection();
            $this->installedFiles = $connection->fetchCol(
                $connection->select()->from($this->getTable(self::INSTALLED_FILES_TABLE), ['file'])
            );
        }
        return in_array($fileName, $this->installedFiles);
    }
}
