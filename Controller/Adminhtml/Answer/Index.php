<?php

namespace Os\Customer\Controller\Adminhtml\Answer;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends Action {

    protected $resultPageFactory = false;

    public function __construct(
         Context $context,
         PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
 
    }

    public function execute() {

        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('Ticket')));

        return $resultPage;
    }

}
