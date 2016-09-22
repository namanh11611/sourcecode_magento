<?php
namespace Magestore\HelloMagento\Block;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        return parent::__construct($context);
    }

    public function sayHello()
    {
        return __('Hello from Template!');
    }
}