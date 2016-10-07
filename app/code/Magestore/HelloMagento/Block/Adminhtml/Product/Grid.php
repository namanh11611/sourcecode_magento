<?php
namespace Magestore\HelloMagento\Block\Adminhtml\Product;
class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magestore_HelloMagento';
        $this->_controller = 'adminhtml_product';
        $this->_headerText = __('Manage Product');
        $this->_addButtonLabel = __('Add New Product');

        parent::_construct();
    }
}