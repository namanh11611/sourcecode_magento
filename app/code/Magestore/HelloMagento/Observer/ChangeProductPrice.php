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

        $product->setPrice($new_price);
//        $product->setCustomPrice($new_price);
//        $product->setOriginalCustomPrice($new_price);
//        $product->getProduct()->setIsSuperMode(true);

        echo "<pre>";
        print_R($product->getPrice());

        die;
        return $this;
    }

//    public function invoke(\Magento\Framework\Event\Observer $observer)
//    {
//        $item = $observer->getEvent()->getData('quote_item');
//        $product = $observer->getEvent()->getData('product');
//        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
//
//        // Load the custom price
//        $price = $product->getPrice() + 10; // 10 is custom price. It will increase in product price.
//
//        // Set the custom price
//        $item->setCustomPrice($price);
//        $item->setOriginalCustomPrice($price);
//
//        // Enable super mode on the product.
//        $item->getProduct()->setIsSuperMode(true);
//    }

}