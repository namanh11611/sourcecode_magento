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
            null,
            [],
            'Product ID'
        )->addColumn(
            'new_price',
            \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
            null,
            [],
            'New Price'
        )->addColumn(
            'status',
            \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
            1,
            [],
            'Status'
        )->setComment(
            'Magestore Product Table'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}