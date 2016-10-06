<?php
namespace Magestore\HelloMagento\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('magestore_magento')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Id'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            255,
            [],
            'Product ID'
        )->addColumn(
            'new_price',
            \Magento\Framework\DB\Ddl\Table::TYPE_REAL,
            255,
            [],
            'New Price'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BLOB,
            255,
            [],
            'Status'
        )->setComment(
            'Magestore Product Table'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}