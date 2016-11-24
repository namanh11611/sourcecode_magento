<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 22-Nov-16
 * Time: 10:24 AM
 */

namespace Magestore\HelloMagento\Model;


class ProductFactory
{
    protected $_objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    public function create($className, array $data = [])
    {
        $model = $this->_objectManager->create($className, $data);

        if(!model instanceof \Magento\Framework\Model\AbstractModel) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('%1 doesn\'t extends \Magento\Framework\Model\AbstractModel', $className)
            );
        }
        return $model;
    }
}