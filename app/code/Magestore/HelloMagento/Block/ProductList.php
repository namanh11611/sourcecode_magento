<?php
namespace Magestore\HelloMagento\Block;

use Magento\Catalog\Block\Product\ListProduct;

class ProductList extends ListProduct {

//    protected $_productCollection;

//    public function __construct(\Magento\Framework\View\Element\Template\Context $context,
//                                \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory) {
//        $this->collectionFactory = $collectionFactory;
//        return parent::__construct($context);
//    }
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $postDataHelper,
            $layerResolver,
            $categoryRepository,
            $urlHelper,
            $data
        );
    }

    /**
     * @return mixed
     */
    protected function _getProductCollection()
    {
        parent::_getProductCollection();
        $this->_productCollection
            ->addAttributeToSelect('*')
            ->load();
        return $this->_productCollection;
    }
}