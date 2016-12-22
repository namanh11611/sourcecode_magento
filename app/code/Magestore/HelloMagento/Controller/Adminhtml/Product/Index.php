<?php
namespace Magestore\HelloMagento\Controller\Adminhtml\Product;

class Index extends \Magento\Backend\App\Action
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
        //Call page factory to render layout and page content
        $this->_setPageData();
        return $this->getResultPage();

//        $resultPage = $this->_resultPageFactory->creat();
//        return $resultPage;
    }

    /*
     * Check permission via ACL resource
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magestore_HelloMagento::hello_manage_products');
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
//        $resultPage->setActiveMenu('Magestore_HelloMagento::hello_manage_products');
        $resultPage->getConfig()->getTitle()->prepend((__('Product')));

        //Add bread crumb
//        $resultPage->addBreadcrumb(__('Magestore'), __('Magestore'));
//        $resultPage->addBreadcrumb(__('Hello Magento!'), __('Manage Product'));

        return $this;
    }
}