<?php
namespace Magestore\HelloMagento\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template {

    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
        return parent::__construct($context);
    }

    public function getProductCollection()
    {
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $collectionFactory = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\CollectionFactory');
//        $collection = $collectionFactory->create()->addAttributeToSelect('*')->load();
//        $collection = $collectionFactory->create()->addAttributeToSelect('name')->addAttributeToFilter('price', array('eq' => 0))->load();
        $collection = $this->collectionFactory->create()->addAttributeToSelect('name')
            ->addAttributeToFilter(array(
                array(
                  'attribute'=>'price',
                    'from'=>0,
                    'to'=>100,
                ),
                array(
                    'attribute'=>'price',
                    'from'=>200,
                    'to'=>500,
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