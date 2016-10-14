<?php
namespace Magestore\HelloMagento\Controller\Addproduct;

class Addproduct extends \Magento\Framework\App\Action\Action {

    protected $_objectManager;

    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\ObjectManagerInterface $objectManager) {
        $this->_objectManager = $objectManager;
        return parent::__construct($context);
    }

    public function execute() {
        // Lấy dữ liệu ra
        $params = $this->getRequest()->getParams();
        $id = $this->getRequest()->getParam('id');
        $product_id = $this->getRequest()->getParam('product_id');
        $new_price = $this->getRequest()->getParam('new_price');
        $status = $this->getRequest()->getParam('status');

        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $model->setData('id', $id);
        $model->setData('product_id', $product_id);
        $model->setData('new_price', $new_price);
        $model->setData('status', $status);
        $model->save();

        // Nhiệm vụ bây giờ là lưu cái param này vào CSDL???
//        \Zend_Debug::dump($params);
//        die();

        // Chuyển hướng sang productlist, sau khi xử lý dữ liệu sẽ chuyển lại từ addproduct về productlist
        $this->_redirect('hellomagento/product/productlist');
    }
}