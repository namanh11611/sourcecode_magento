<?php

namespace Magestore\HelloMagento\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();

        // Get magestore_magento table
        $tableName = $setup->getTable('magestore_magento');
        // Check if the table already exists
//        if ($setup->getConnection()->isTableExists($tableName) == true) {
//            // Declare data
//            $data = [
//                [
//                    'product_id' => '100010',
//                    'new_price' => '200',
//                    'status' => 1
//                ],
//                [
//                    'product_id' => '100015',
//                    'new_price' => '300',
//                    'status' => 1
//                ]
//            ];
//
//            // Insert data to table
//            foreach ($data as $item) {
//                $setup->getConnection()->insert($tableName, $item);
//            }
//        }

        $setup->endSetup();
    }
}