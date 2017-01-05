<?php

namespace Magestore\HelloMagento\Model\ResourceModel\Product\Grid;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
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