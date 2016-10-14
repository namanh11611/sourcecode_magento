<?php

namespace Magestore\HelloMagento\Model\ResourceModel\Product;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Magestore\HelloMagento\Model\Product',
            'Magestore\HelloMagento\Model\ResourceModel\Product'
        );
    }
}