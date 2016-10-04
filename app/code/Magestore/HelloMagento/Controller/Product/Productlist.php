<?php
namespace Magestore\HelloMagento\Controller\Product;

class Productlist extends \Magento\Framework\App\Action\Action {

    protected $resultPageFactory;

    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory) {
        $this->resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute() {
        $resultPage = $this->resultPageFactory->create();
//        $this->getLayout()->getBlock('head')->setTitle('Product List');
        return $resultPage;
    }
}