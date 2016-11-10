<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 04-Nov-16
 * Time: 9:43 AM
 */
namespace Magestore\HelloMagento\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ProcessFrontFinalPriceObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        // Bắt event catalog_product_get_final_price
        // Event này chỉ được phát khi vào xem chi tiết một sản phẩm là tđn???

        // Ở đây, edit_product đang là dạng model product do chúng ta tuỳ chỉnh, chỉ có id, price và status
        $id_product = $observer->getData('id');
        $price_product = $observer->getData('final_price');
        $status_product = $observer->getData('status');

        $product = $observer->getEvent()->getProduct();

        \Zend_Debug::dump('Process in Source code');

//        echo "<pre>"."Id: ";
//        print_R($product->getId());
//        echo "<pre>"."Name: ";
//        print_R($product->getName());
//        echo "<pre>"."Price: ";
//        print_R($product->getPrice());
//        echo "<pre>"."FinalPrice: ";
//        print_R($product->getFinalPrice());
//        echo "<pre>"."Status: ";
//        print_R($product->getStatus());
//        \Zend_Debug::dump($pId);
//        \Zend_Debug::dump($storeId);

//        $id = $edit_product->getId();
//        $final_price = $edit_product->getFinalPrice();
//
        \Zend_Debug::dump($id_product);
        \Zend_Debug::dump($price_product);
        \Zend_Debug::dump($status_product);

        $product->setFinalPrice(100);
        $product->setPrice(100);

        die;
    }
}