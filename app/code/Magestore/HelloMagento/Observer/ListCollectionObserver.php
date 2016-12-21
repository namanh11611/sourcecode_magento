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
    protected $_objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager) {
        $this->_objectManager = $objectManager;
    }

    public function execute(Observer $observer)
    {
        $collection = $observer->getEvent()->getCollection();

        $listEditProduct = $this->_objectManager
            ->get('Magestore\HelloMagento\Model\ResourceModel\Product\Collection');

//        $factory = $this->_objectManager->get('Magestore\HelloMagento\Model\Product');

        foreach ($collection as $product)
        {
//            $editProduct = $factory->load($product->getId());

//            $editId = $product->getId();
//            \Zend_debug::dump($editId);
            // Rõ ràng ở trên dump ra Id lần lượt bằng 1, 2, 3, 4 rồi này ?????

//            $editProduct = $listEditProduct->addFieldToFilter('product_id', $editId);
//            \Zend_debug::dump($listEditProduct);
//            \Zend_debug::dump($editProduct->getData());

//            $product->setPrice($editProduct->getData('new_price'));

            // Hiện tại dump vẫn ra thằng có product_id = 1, méo hiểu sao???
            // Mặc dù đã foreach nhưng nó vẫn chỉ xét thằng đầu tiên?????

            // Hình như là chúng ta không cần thằng dưới đây?
            // $product->setFinalPrice(100);
        }
    }
}