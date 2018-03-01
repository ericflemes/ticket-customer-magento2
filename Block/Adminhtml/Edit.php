<?php

namespace Os\Customer\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Os\Customer\Model\OsFactory;
use Magento\Customer\Model\Session;

class Edit extends Template {

    protected $_postFactory;
    protected $_customerSession;

    public function __construct(
    Context $context, OsFactory $postFactory, Session $customerSession
    ) {

        $this->_customerSession = $customerSession;
        $this->setPostFactory($postFactory);
        parent::__construct($context);
    }

    function setPostFactory($_postFactory) {
        $this->_postFactory = $_postFactory;
    }

    public function getPostFactory() {
        return $this->_postFactory->create();
    }

    public function getTicketID() {
        $_ticket = $this->_request->getParams();
        return $_ticket['ticket_id'];
    }

    public function getTicketData() {

        $ticket_factory = $this->getPostFactory();
        $ticket_data = $ticket_factory->load($this->getTicketID());
        return $ticket_data;
    }

    public function getFormKey() {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $FormKey = $objectManager->get('Magento\Framework\Data\Form\FormKey');
        return $FormKey->getFormKey();
    }

}
