<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 09-Jan-17
 * Time: 2:29 PM
 */

namespace Magestore\HelloMagento\Ui\DataProvider\Product;

use Magestore\HelloMagento\Ui\DataProvider\AbstractProvider;

class DataProvider extends AbstractProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Magento\Framework\Api\Search\ReportingInterface $reporting,
        \Magento\Framework\Api\Search\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magestore\HelloMagento\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $urlBuilder,
            $meta,
            $data
        );
        $this->collection = $collectionFactory->create();
    }
}