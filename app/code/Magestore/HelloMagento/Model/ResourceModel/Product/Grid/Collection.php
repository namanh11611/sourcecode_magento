<?php

namespace Magestore\HelloMagento\Model\ResourceModel\Product\Grid;

//use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Magestore\HelloMagento\Ui\DataProvider\Product\DataProviderFake;

class Collection extends DataProviderFake
{

    // Theo như cái di.xml nó hướng dẫn thì list sản phẩm cho bảng product fake kia sẽ được hiển thị từ cái collection này.
    protected function _construct()
    {
    }

//    public function setItems(array $items = null)
//    {
//        if ($items) {
//            foreach ($items as $item) {
//                $this->addItem($item);
//            }
//            unset($this->totalCount);
//        }
//        return $this;
//    }
}