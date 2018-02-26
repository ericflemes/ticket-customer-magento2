<?php

namespace Os\Customer\Controller\Create;

#use Os\Customer\Model\OsFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\ResultFactory;

class Index extends Action {

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $customerSession;
    public $id_customer;
    protected $_resultFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Session $customerSession, Context $context, PageFactory $resultPageFactory, ResultFactory $resultFactory
    ) {
        $this->customerSession = $customerSession;
        $this->resultPageFactory = $resultPageFactory;

        $this->_resultFactory = $resultFactory;


        parent::__construct($context);
    }

    /**
     * Customer order history
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute() {

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!$this->customerSession->isLoggedIn()) {
            
            $resultRedirect->setPath('customer/account/login');
            return $resultRedirect;
        }
        

        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('My Tickets'));

        return $resultPage;
    }

}
