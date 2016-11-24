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
        // Lấy toàn bộ dữ liệu ra từ form.phtml
        // $params = $this->getRequest()->getParams();
        // Lấy từng trường dữ liệu từ form.phtml
        $product_id = $this->getRequest()->getParam('id');
        $new_price = $this->getRequest()->getParam('final_price');
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
        \zend_debug::dump($newModel->getData());
        die;

        // Ơ, cái này load được sản phẩm thật rồi này??????????????????????????
        // ??????????????????????
        $repo = $this->_objectManager->get('Magento\Catalog\Model\ProductRepository');
        $search_criteria = $this->_objectManager->create(
            'Magento\Framework\Api\SearchCriteriaInterface'
        );
        $result = $repo->getList($search_criteria);
        $products = $result->getItems();
        foreach($products as $product)
        {
            echo $product->getPrice(),"\n";
        }
//        die;

        // Magento nó phát event sẵn rồi, không cần phát lại đâu, chỉ cần bắt và xử lý
//        $this->_eventManager->dispatch('catalog_product_get_final_price', ['edit_product' => $model]);

        // Sau khi xử lý dữ liệu sẽ chuyển hướng từ addproduct sang productlist
        $this->_redirect('hellomagento/product/productlist');
    }
}