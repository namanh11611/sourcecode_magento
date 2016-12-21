<?php
namespace Magestore\HelloMagento\Controller\Adminhtml\Product;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        //Call page factory to render layout and page content
        $this->_setPageData();
        return $this->getResultPage();
    }

    /*
     * Check permission via ACL resource
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_HelloMagento::product_manage');
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
        $resultPage->setActiveMenu('Mageplaza_HelloMagento::product');
        $resultPage->getConfig()->getTitle()->prepend((__('Product')));

        //Add bread crumb
        $resultPage->addBreadcrumb(__('Magestore'), __('Magestore'));
        $resultPage->addBreadcrumb(__('Hello Magento!'), __('Manage Product'));

        return $this;
    }
}