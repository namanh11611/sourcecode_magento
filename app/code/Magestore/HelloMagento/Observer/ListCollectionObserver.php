<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 10-Nov-16
 * Time: 1:58 PM
 */
namespace Magestore\HelloMagento\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;

class ListCollectionObserver implements ObserverInterface
{
    // OK, Observer này bắt sự kiện khi load một list các sản phẩm

    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getCollection();

        foreach ($collection as $product)
        {
//            \Zend_Debug::dump($product);
            $product->setPrice(100);
            $product->setFinalPrice(100);
        }
    }
}