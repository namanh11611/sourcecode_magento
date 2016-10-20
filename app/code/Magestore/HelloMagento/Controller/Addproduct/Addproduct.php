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
        // Lấy toàn bộ dữ liệu ra từ form.phtml
//        $params = $this->getRequest()->getParams();
        // Lấy từng trường dữ liệu từ form.phtml
        $product_id = $this->getRequest()->getParam('product');
        $new_price = $this->getRequest()->getParam('price');
        $status = $this->getRequest()->getParam('status');

        // Tạo Model mới và lưu trữ dữ liệu
        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $model->setData('product_id', (int) $product_id);
        $model->setData('new_price', (float) $new_price);
        $model->setData('status', (int) $status);
        $model->save();

//        \Zend_Debug::dump((int) $product_id);
//        \Zend_Debug::dump((float) $new_price);
//        \Zend_Debug::dump((int) $status);
//        die();

        // Chuyển hướng sang productlist, sau khi xử lý dữ liệu sẽ chuyển lại từ addproduct về productlist
        $this->_redirect('hellomagento/product/productlist');
    }
}