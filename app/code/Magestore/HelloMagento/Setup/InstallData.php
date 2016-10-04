<?php
namespace Magestore\HelloMagento\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $_blogFactory;

    public function __construct(\Magestore\HelloMagento\Model\BlogFactory $blogFactory)
    {
        $this->_blogFactory = $blogFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'title' => "Sample title 1",
            'content' => "Sample content 1"
        ];
        $blog = $this->_blogFactory->create();
        $blog->addData($data)->save();
    }
}