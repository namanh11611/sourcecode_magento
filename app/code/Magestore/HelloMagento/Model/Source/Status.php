<?php

namespace Magestore\HelloMagento\Model\Source;
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 23-Dec-16
 * Time: 9:19 AM
 */
class Status implements \Magento\Framework\Option\ArrayInterface
{
    const STATUS_AVAILABLE = 1;

    const STATUS_UNAVAILABLE = 0;

    public function toOptionArray()
    {
        return [
            ['label' => __('Available'), 'value' => self::STATUS_AVAILABLE],
            ['label' => __('Unavailable'), 'value' => self::STATUS_UNAVAILABLE]
        ];
    }

    public static function getOptionArray()
    {
        return [
            self::STATUS_AVAILABLE => __('Available'),
            self::STATUS_UNAVAILABLE => __('Unavailable'),
        ];
    }
}