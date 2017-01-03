<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 23-Dec-16
 * Time: 11:16 AM
 */

namespace Magestore\HelloMagento\Controller\Adminhtml\Product;


class Edit extends \Magento\Backend\App\Action
{
    protected $_resultPageFactory;

    protected $_resultPage;

    public function __construct(\Magento\Backend\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_setPageData();
        return $this->getResultPage();
    }

    public function getResultPage()
    {
        if (is_null($this->_resultPage)) {
            $this->_resultPage = $this->_resultPageFactory->create();
        }
        return $this->_resultPage;
    }

    protected function _setPageData()
    {
        $resultPage = $this->getResultPage();
        $resultPage->getConfig()->getTitle()->prepend((__('Edit Product')));
        return $this;
    }

}