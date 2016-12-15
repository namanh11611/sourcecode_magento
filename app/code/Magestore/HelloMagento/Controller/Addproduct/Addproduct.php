<?php
namespace Magestore\HelloMagento\Controller\Addproduct;

class Addproduct extends \Magento\Framework\App\Action\Action
{
    protected $_objectManager;

    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\ObjectManagerInterface $objectManager) {
        $this->_objectManager = $objectManager;
        return parent::__construct($context);
    }

    public function execute() {

        // Magento nó phát event sẵn rồi, không cần phát lại đâu, chỉ cần bắt và xử lý

        // Lấy toàn bộ dữ liệu ra từ form.phtml
        // $params = $this->getRequest()->getParams();
        // Lấy từng trường dữ liệu từ form.phtml
        $product_id = $this->getRequest()->getParam('id');
        $new_price = $this->getRequest()->getParam('price');
        $status = $this->getRequest()->getParam('status');

        // Tạo Model mới và lưu trữ dữ liệu điền vào form
        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $model->setData('product_id', (int) $product_id);
        $model->setData('new_price', (float) $new_price);
        $model->setData('status', (int) $status);
        $model->save();

        $newModel = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        $resourceModel = $this->_objectManager->create('Magestore\HelloMagento\Model\ResourceModel\Product');
        $resourceModel->load($newModel, $model->getId());

//        echo "Controller Addproduct/Addproduct ";
//        \zend_debug::dump($newModel->getData());
//        die;

        // Sau khi xử lý dữ liệu sẽ chuyển hướng từ addproduct sang productlist
        $this->_redirect('hellomagento/product/productlist');

        $block = $this->_view->getLayout()
            ->createBlock('Magestore\HelloMagento\Block\ProductList')
            ->setTemplate('Magento_Catalog::product/list.phtml')
            ->toHtml();
        return $this->getResponse()->setBody($block);

//        echo $block;
//        die;
//        return $block;
    }
}