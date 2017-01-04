<?php
/**
 * Created by PhpStorm.
 * User: NamAnh
 * Date: 03-Jan-17
 * Time: 2:58 PM
 */

namespace Magestore\HelloMagento\Controller\Adminhtml\Product;

use Magestore\HelloMagento\Controller\Adminhtml\Product\AbstractAction;

class Save extends AbstractAction
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $modelId = (int)$this->getRequest()->getParam('id');
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            return $resultRedirect->setPath('*/*/');
        }
        $model = $this->_objectManager->create('Magestore\HelloMagento\Model\Product');
        if ($modelId) {
            $this->_resource->load($model, $modelId);
        }
        if(isset($data['status']) && is_array($data['status'])){
            $data['status'] = implode(',', $data['status']);
        }
        if(empty($data['product_id'])){
            unset($data['product_id']);
        }
        $model->setData($data);
        try {
            $this->_resource->save($model);
            $this->messageManager->addSuccess(__('Product was successfully saved'));
        }catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            return  $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        if ($this->getRequest()->getParam('back') == 'edit') {
            return  $resultRedirect->setPath('*/*/edit', ['id' =>$model->getId()]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}