<?php
namespace Magestore\HelloMagento\Block;

class Form extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;
    protected $_productFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductFactory $_productFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->_productFactory = $_productFactory;
        return parent::__construct($context);
    }

    // Lọc sản phẩm hiển thị ra "form thay đổi giá" được tạo bằng HTML trong file form.phtml
    // Hàm này được dùng trong form.phtml
    public function getProductCollection()
    {
        $collection = $this->collectionFactory->create()->addAttributeToSelect('id')->load();
        return $collection;
    }

    // Load sản phẩm bằng id để thay đổi giá của nó
//    public function getLoadProduct($id)
//    {
//        var_dump("I am Here");
//        die;
//        return $this->_productFactory->create()->load($id);
//    }

    // Khi gọi click vào button sẽ gọi hàm này, sau đó chúng ta sẽ chuyển đến action addproduct
    public function getActionOfForm()
    {
        return $this->getUrl('hellomagento/addproduct/addproduct');
    }
}
