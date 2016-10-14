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

    public function getActionOfForm()
    {
        // Khi gọi Block này, chúng ta sẽ gọi đến action addproduct
        return $this->getUrl('hellomagento/addproduct/addproduct');
    }
}
