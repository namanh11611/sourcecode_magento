<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 03-Jan-17
 * Time: 1:35 PM
 */

namespace Magestore\HelloMagento\Block\Adminhtml\Product\Edit\Button;

use Magento\Ui\Component\Control\Container;

class Delete extends Generic
{
    public function getButtonData()
    {
        $id = $this->getParam('id', false);
        if(!$id) {
            return [];
        }
        return [
            'label' => __('Delete'),
            'class' => 'save primary',
            'url' => $this->getUrl('*/*/delete', ['id' => $id])
        ];
    }
}