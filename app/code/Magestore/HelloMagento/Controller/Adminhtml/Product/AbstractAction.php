<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 03-Jan-17
 * Time: 2:59 PM
 */

namespace Magestore\HelloMagento\Controller\Adminhtml\Product;


abstract class AbstractAction extends \Magento\Backend\App\Action
{
    protected $_resultForwardFactory;

    protected $_resultlayoutFactory;

    protected $_resultPageFactory;

    protected $_resource;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magestore\WebposDelivery\Model\ResourceModel\Timeslot\Timeslot $resource
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultLayoutFactory = $resultLayoutFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        $this->_resource = $resource;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_HelloMagento::hellomagento');
    }
}