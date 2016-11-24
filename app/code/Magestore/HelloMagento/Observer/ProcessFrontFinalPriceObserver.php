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
        // Observer này được tạo để viết đè lên observer cùng tên trong module Catalog Rule
        // Bắt event catalog_product_get_final_price
        // Event này chỉ được phát khi vào xem chi tiết một sản phẩm là tđn?????

        // Ở đây, edit_product đang là dạng model product do chúng ta tuỳ chỉnh, chỉ có id, price và status
        $id_product = $observer->getData('id');
        $price_product = $observer->getData('final_price');
        $status_product = $observer->getData('status');

        $product = $observer->getEvent()->getProduct();
    }
}