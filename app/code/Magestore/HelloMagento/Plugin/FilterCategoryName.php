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

    /**
     * Sets a filter on the category collection
     * Đặt một bộ lọc trên danh sách các thể loại
     *
     * @param \Magento\Catalog\Model\Product $product
     * @param \Magento\Framework\Data\Collection $categoryCollection
     */
    public function beforeSetCategoryCollection(
        \Magento\Catalog\Model\Product $product,
        \Magento\Framework\Data\Collection $categoryCollection
    ) {
        $categoryCollection->addFilterToFilter('name', array('eq' => 'Electronics'));

        echo 'This is FilterCategoryName!';
        die();
    }
}