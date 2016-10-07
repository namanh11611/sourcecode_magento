<?php
namespace Magestore\HelloMagento\Component;
class Simple extends \Magento\Ui\Component\AbstractComponent
{
    const NAME = 'hellomagento_product_grid';
    public function getComponentName()
    {
        return static::NAME;
    }

    //added this method
    public function getEvenMoreData()
    {
        return 'Even More Data!';
    }
    public function getDataSourceData()
    {
        return ['data' => $this->getContext()->getDataProvider()->getData()];
    }
}