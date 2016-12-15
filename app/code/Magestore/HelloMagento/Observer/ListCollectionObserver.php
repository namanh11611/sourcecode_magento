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
    // Bởi vì sau khi điền form sẽ hiển thị list sản phẩm nên đây chính là event mà chúng ta cần

    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getCollection();

        foreach ($collection as $product)
        {
//            $product->setPrice(100);

            // Hình như là chúng ta không cần thằng dưới đây?
            // $product->setFinalPrice(100);
        }
    }
}