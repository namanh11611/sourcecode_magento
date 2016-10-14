<?php

namespace Magestore\HelloMagento\Controller\Addproduct;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magestore\HelloMagento\Model\Product;

class Displayproduct extends Action
{
    /**
     * @var \Magestore\HelloMagento\Model\Product
     */
    protected $_modelProduct;

    /**
     * @param Context $context
     * @param Product $modelProduct
     */
    public function __construct(
        Context $context,
        Product $modelProduct
    )
    {
        parent::__construct($context);
        $this->_modelProduct = $modelProduct;
    }

    public function execute()
    {
        /**
         * When Magento get your model, it will generate a Factory class
         * for your model at var/generaton folder and we can get your
         * model by this way
         */
        $productModel = $this->_modelProduct;

        // Load the item with ID is 1
        $item = $productModel->load(1);
        var_dump($item->getData());

        // Get news collection
        $productCollection = $productModel->getCollection();
        // Load all data of collection
        var_dump($productCollection->getData());
//        \Zend_Debug::dump($productCollection->getData());
//        die();
    }
}