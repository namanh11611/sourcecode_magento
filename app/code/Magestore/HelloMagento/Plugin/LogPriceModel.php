<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 10-Jan-17
 * Time: 4:13 PM
 */

namespace Magestore\HelloMagento\Plugin;


class LogPriceModel
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $loggerInterface
    ) {
        $this->logger = $loggerInterface;
    }

    /**
     * Performs logs around the price model
     * Thực hiện xung quanh quá trình lấy giá của model
     *
     * @param \Magento\Catalog\Model\Product $product
     * @param \Closure $proceed
     */
    public function aroundGetPriceModel(\Magento\Catalog\Model\Product $product, \Closure $proceed)
    {
        $this->logger->debug('Fetching price model for '.get_class($product));

        echo 'This is before LogPriceModel!';
        die();

        $result = $proceed();
        $this->logger->debug('Price model is '.get_class($result));
        return $result;

        echo 'This is after LogPriceModel!';
        die();

    }
}