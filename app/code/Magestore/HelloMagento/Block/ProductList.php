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
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $this->_productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
        $this->_productCollection
            ->addAttributeToSelect('*')
            ->addAttributeToFilter(array(
            array(
                'attribute'=>'price',
                'from'=>0,
                'to'=>100,
            ),
            array(
                'attribute'=>'price',
                'from'=>200,
                'to'=>500,
            ),
        ));
        $this->_productCollection->load();
        return $this->_productCollection;
    }
}