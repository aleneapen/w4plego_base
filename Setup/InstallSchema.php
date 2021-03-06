<?php

namespace W4PLEGO\CmsUpgrade\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 *
 * @package W4PLEGO\CmsUpgrade\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context = null)
    {
        $installer = $setup;
        $installer->startSetup();

        $tableName = $setup->getTable('w4plego_cms_upgrade_data_version');
        if (!$setup->getConnection()->isTableExists($tableName)) {
            $table = $installer->getConnection()->newTable(
                $tableName
            )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Id'
            )->addColumn(
                'data_version',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'Data Version'
            );
            $installer->getConnection()->createTable($table);
            $setup->getConnection()->insert($tableName, ['data_version' => '0.0.1']);

            $installer->endSetup();
        }
    }
}
