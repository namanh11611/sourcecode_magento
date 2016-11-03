<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 20-Oct-16
 * Time: 11:29 AM
 */

namespace Magestore\HelloMagento\Observer;

use Magento\Catalog\Model\ProductFactory;

class ChangeProductPrice implements \Magento\Framework\Event\ObserverInterface
{

    protected $productFactory;

    public function __construct(ProductFactory $productFactory)
    {
        $this->productFactory = $productFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

        $event = $observer->getEvent();
        $product_id = $event->getProduct_id();
        $new_price = $event->getNew_price();

        $product = $objectManager->get('Magento\Catalog\Model\Product')->load($product_id);

        echo "<pre>";
        print_R($product->getPrice());

        // Chỉ còn một bước nữa là set price cho product???
        // Phải làm thế nào???

        $product->setFinalPrice($new_price);
        $product->setCustomPrice($new_price);
        $product->setOriginalCustomPrice($new_price);
        $product->setIsSuperMode(true);

        echo "<pre>";
        print_R($product->getPrice());

        die;
        return $this;
    }

    public function changeprice(Varien_Event_Observer $event)
    {
//        $observer->getProduct()->setFinalPrice(5);
        if(Mage::app()->getRequest()->getParam('id')) {
            $price_to_add = Mage::getModel('catalog/product')->load(Mage::app()->getRequest()->getParam('id')->getPrice());
            $product = $event->getEvent()->getProduct();
            $original_price = $product->getPrice();
            $customprice = $original_price + $price_to_add;
            $product->setPrice($customprice);
        }
        echo 'call';
        exit;
    }


}