<?php

namespace Os\Customer\Controller\Adminhtml\Answer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action {

    protected $_resultPageFactory = false;

    public function __construct(
    Context $context, PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        $post = $this->getRequest()->getPostValue();

        if (empty($post)) {
            $resultPage = $this->_resultPageFactory->create();
            return $resultPage;
        } else {
            $resultRedirect = $this->resultRedirectFactory->create();

            $model = $this->_objectManager->create('Os\Customer\Model\Os');
            $model->setIsActive(2);
            $model->setAnswer($post['answer']);
            if ($model->setId($post['ticket_id'])->save()) {
                $this->messageManager->addSuccess(__('Ticket updated successfully.'));
                $resultRedirect->setUrl($this->_redirect('support_tickets/ticket'));
            } else {
                $this->messageManager->addError($e->getMessage());
            }

            $resultRedirect->setUrl($this->_redirect('os_customer/answer'));
        }
    }

}
