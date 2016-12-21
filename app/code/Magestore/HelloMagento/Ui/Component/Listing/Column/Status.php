<?php

/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 21-Dec-16
 * Time: 2:21 PM
 */
namespace  Magestore\HelloMagento\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;
use Magestore\WebposDelivery\Model\Source\Status as TimeslotStatus;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['label' => __('Enabled'),'value' => TimeslotStatus::STATUS_ENABLED],
            ['label' => __('Disabled'),'value' => TimeslotStatus::STATUS_DISABLED]
        ];
    }
}