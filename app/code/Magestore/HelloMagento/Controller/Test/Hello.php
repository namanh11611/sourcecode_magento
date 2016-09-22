<?php
namespace Magestore\HelloMagento\Controller\Test;

class Hello extends \Magento\Framework\App\Action\Action {
    public function __construct(\Magento\Framework\App\Action\Context $context) {
        return parent::__construct($context);
    }

    public function execute() {
        echo 'Hello!';
        exit;
    }
}