<?php
namespace Magestore\HelloMagento\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        return parent::__construct($context);
    }

    public function getProductCollection()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
//        $collection = $productCollection->create()->addAttributeToSelect('*')->load();
//        $collection = $productCollection->create()->addAttributeToSelect('name')->addAttributeToFilter('price', array('eq' => 0))->load();
        $collection = $productCollection->create()->addAttributeToSelect('name')
            ->addAttributeToFilter(array(
                array(
                  'attribute'=>'price',
                    'from'=>0,
                    'to'=>100,
                ),
                array(
                    'attribute'=>'price',
                    'from'=>500,
                    'to'=>700,
                ),
            ))
            ->load();
        return $collection;
    }

    public function sayHello()
    {
        return __('Hello from Template!');
    }
}