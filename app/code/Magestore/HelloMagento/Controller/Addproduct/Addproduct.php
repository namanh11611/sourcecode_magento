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
        // $params = $this->getRequest()->getParams();
        // Lấy từng trường dữ liệu từ form.phtml
        $product_id = $this->getRequest()->getParam('product');
        $new_price = $this->getRequest()->getParam('price');
        $status = $this->getRequest()->getParam('status');

        // Tạo Model mới và lưu trữ dữ liệu
        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $model->setData('id', (int) $product_id);
        $model->setData('final_price', (float) $new_price);
        $model->setData('status', (int) $status);
        $model->save();

        // Tiếp theo, chúng ta sẽ dùng event để edit price của product
        $this->_eventManager->dispatch('catalog_product_get_final_price', ['product' => $model]);

        // Sau khi xử lý dữ liệu sẽ chuyển hướng từ addproduct sang productlist
        $this->_redirect('hellomagento/product/productlist');
    }
}