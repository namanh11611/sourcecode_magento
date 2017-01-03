<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 03-Jan-17
 * Time: 1:35 PM
 */

namespace Magestore\HelloMagento\Block\Adminhtml\Product\Edit\Button;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Generic implements ButtonProviderInterface
{
    /**
     * @var Context
     */
    protected $context;


    protected $registry;

    public function  __construct(
        Context $context,
        \Magento\Framework\Registry $registry
    ) {
        $this->context = $context;
        $this->registry = $registry;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrl($route, $params);
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getButtonData()
    {
        return [];
    }

    public function getParam($key)
    {
        return $this->context->getRequestParam($key, false);
    }

    public function getParams()
    {
        return $this->context->getRequestParams();
    }
}