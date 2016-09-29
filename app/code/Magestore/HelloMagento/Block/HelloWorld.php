<?php
namespace Magestore\HelloMagento\Block;

/**
 * Class HelloWorld
 * @package Magestore\HelloMagento\Block
 */
class HelloWorld extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * HelloWorld constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollection
    ) {
        parent::__construct($context);
        $this->collectionFactory = $productCollection;
    }

    /**
     * @return $this
     */
    public function getProductCollection()
    {
        $collection = $this->collectionFactory->create()->addAttributeToSelect('name')
            ->addAttributeToFilter(array(
                array(
                  'attribute'=>'price',
                    'from'=>0,
                    'to'=>50,
                ),
                array(
                    'attribute'=>'price',
                    'from'=>70,
                    'to'=>100,
                ),
            ))
            ->load();
        return $collection;
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function sayHello()
    {
        return __('Hello from Template!');
    }
}
