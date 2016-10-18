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
        $product_id = $this->getRequest()->getParam('product');
        $new_price = $this->getRequest()->getParam('price');
        $status = $this->getRequest()->getParam('status');

        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $model->setData('product_id', (int) $product_id);
        $model->setData('new_price', (float) $new_price);
        if($status == 'available') {
            $model->setData('status', 1);
        } else {
            $model->setData('status', 0);
        }
        $model->save();

        // Nhiệm vụ bây giờ là lưu cái param này vào CSDL???
        \Zend_Debug::dump($params);
        die();

        // Chuyển hướng sang productlist, sau khi xử lý dữ liệu sẽ chuyển lại từ addproduct về productlist
        $this->_redirect('hellomagento/product/productlist');
    }
}