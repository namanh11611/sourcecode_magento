<?php
namespace Magestore\HelloMagento\Block;

class Form extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
        return parent::__construct($context);
    }

    public function getProductCollection()
    {
        // Lọc sản phẩm hiển thị ra bảng được tạo bằng HTML trong file form.phtml
        $collection = $this->collectionFactory->create()->addAttributeToSelect('id')->load();
        return $collection;
    }

    public function getActionOfForm()
    {
        // Khi gọi Block này, chúng ta sẽ gọi đến action addproduct
        return $this->getUrl('hellomagento/addproduct/addproduct');
    }
}
