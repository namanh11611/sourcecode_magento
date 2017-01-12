<?php

/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 09-Jan-17
 * Time: 2:29 PM
 */
namespace Magestore\HelloMagento\Ui\Component;

use Magento\Customer\Api\Data\AttributeMetadataInterface;
use Magento\Customer\Ui\Component\Listing\AttributeRepository;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\Reporting;

class DataProvider extends \Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider
{

    // Base on Magento\Ui\DataProvider\AbstractDataProvider
    // Xem Magento\Customer\Ui\Component\DataProvider
    // Có gì nhầm lẫn ở đây chăng????

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Reporting $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        AttributeRepository $attributeRepository,
        array $meta = [],
        array $data = []
    ) {
        $this->attributeRepository = $attributeRepository;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );
    }

    public function getData()
    {
        // Xử lý ở đây đúng không nhỉ???
        $data = parent::getData();

        foreach ($data['item'] as $item) {
            if ($item['product_id'] == 1) {
                // ???
            }
        }
        return $data;
    }
}