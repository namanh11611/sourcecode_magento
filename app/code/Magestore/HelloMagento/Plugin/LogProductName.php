<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 10-Jan-17
 * Time: 3:52 PM
 */

namespace Magestore\HelloMagento\Plugin;


class LogProductName
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $loggerInterface
    ) {
        $this->logger = $loggerInterface;
    }

    /**
     * Logs the Product Name after product name is fetched.
     * Thực hiện sau khi lấy tên sản phẩm
     *
     * @param \Magento\Catalog\Model\Product $product
     */
    public function afterGetName(\Magento\Catalog\Model\Product $product)
    {
        $this->logger->debug($product->getName());
        echo 'This is LogProductName';
        die();
    }
}