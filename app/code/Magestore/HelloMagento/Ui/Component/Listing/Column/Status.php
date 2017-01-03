<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 23-Dec-16
 * Time: 8:41 AM
 */

namespace Magestore\HelloMagento\Ui\Component\Listing\Column;

use Magento\Framework\Data\OptionSourceInterface;
use Magestore\HelloMagento\Model\Source\Status as ProductStatus;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['label' => __('Available'), 'value' => 1],
            ['label' => __('Unavailable'), 'value' => 0]
        ];
    }
}