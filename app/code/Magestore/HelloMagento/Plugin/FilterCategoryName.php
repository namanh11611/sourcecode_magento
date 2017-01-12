<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 10-Jan-17
 * Time: 4:05 PM
 */

namespace Magestore\HelloMagento\Plugin;


class FilterCategoryName
{
    public function beforeSetCategoryCollection(
        \Magento\Catalog\Model\Product $product,
        \Magento\Framework\Data\Collection $categoryCollection
    ) {
        $categoryCollection->addFilterToFilter('name', array('eq' => 'Electronics'));
    }
}