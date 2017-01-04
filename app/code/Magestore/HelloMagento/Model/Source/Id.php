<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 03-Jan-17
 * Time: 2:33 PM
 */

namespace Magestore\HelloMagento\Model\Source;


class Id implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['label' => __('1'), 'value' => 1],
            ['label' => __('2'), 'value' => 2],
            ['label' => __('3'), 'value' => 3],
            ['label' => __('4'), 'value' => 4]
        ];
    }

    public static function getOptionArray()
    {
        return [
            1 => __('1'),
            2 => __('2'),
            3 => __('3'),
            4 => __('4')
        ];
    }
}