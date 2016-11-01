<?php
namespace Magestore\HelloMagento\Block;

class Form extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;
    protected $_productloader;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductFactory $_productloader)
    {
        $this->collectionFactory = $collectionFactory;
        $this->_productloader = $_productloader;
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
    public function getLoadProduct($id)
    {
        return $this->_productloader->create()->load($id);
    }

    // Khi gọi Block này, chúng ta sẽ gọi đến action addproduct
    public function getActionOfForm()
    {
        return $this->getUrl('hellomagento/addproduct/addproduct');
    }
}
