<?php

namespace Magestore\HelloMagento\Model;

use Magento\Framework\Model\AbstractModel;

class Product extends AbstractModel
{
    /**
     * Define resource model
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\Resource\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    protected function _construct()
    {
        $this->_init('Magestore\HelloMagento\Model\ResourceModel\Product');
    }
}