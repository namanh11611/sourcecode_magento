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

    public function aroundGetPriceModel(\Magento\Catalog\Model\Product $product, \Closure $proceed)
    {
        $this->logger->debug('Fetching price model for '.get_class($product));
        $result = $proceed();
        $this->logger->debug('Price model is '.get_class($result));
        return $result;
    }
}