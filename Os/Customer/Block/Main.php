<?php

namespace Os\Customer\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Os\Customer\Model\OsFactory;
use Magento\Customer\Model\Session;

class Main extends Template {

    protected $_postFactory;
    protected $_customerSession;

    public function __construct(
    Context $context, OsFactory $postFactory, Session $customerSession
    ) {
        $this->_customerSession = $customerSession;
        $this->setPostFactory($postFactory);
        parent::__construct($context);
    }

    public function oTeste() {
        $id_owner = $this->_customerSession->getCustomer()->getId();
        return $id_owner;
    }

    public function getCustomerId() {
        $id_owner = $this->_customerSession->getCustomer();
        return $id_owner;
    }

    /**
     * Build the pagination and get the @param in url
     *
     * @return string
     */
    public function getTicketCollection() {

        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;

        $collection = $this->getPostFactory()
                        ->getCollection()
                        ->addFieldToFilter('entity_id', 2)
                        ->setPageSize(10)
                        ->setCurPage($page)->setOrder('ticket_id', 'desc');

        return $collection;
    }

    /**
     * Build the pagination, xml need to cache:flush 
     *
     * @return string
     */
    protected function _prepareLayout() {
        $collection = $this->getTicketCollection();

        // echo $collection->getSelect()->__toString();
        // die();

        parent::_prepareLayout();
        if ($collection) {
            // create pager block for collection
            $pager = $this->getLayout()->createBlock('Magento\Theme\Block\Html\Pager', 'os_customer');

            // // assign collection to pager
            $pager->setLimit(10)->setCollection($collection);
            $pager->setAvailableLimit([10 => 10, 20 => 20, 50 => 50, 100 => 100]);
            $this->setChild('pager', $pager); // set pager block in layout
        }
        return $this;
    }

    /**
     * @return string
     */
    // method for get pager html
    public function getPagerHtml() {
        return $this->getChildHtml('pager');
    }

    function getPostFactory() {
        return $this->_postFactory->create();
    }

    /**
     * method set the factory
     *
     * @return string
     */
    function setPostFactory($_postFactory) {
        $this->_postFactory = $_postFactory;
    }

    /**
     * Retrieve form action
     *
     * @return string
     */
    public function getFormAction() {
        // companymodule is given in routes.xml
        // controller_name is folder name inside controller folder
        // action is php file name inside above controller_name folder

        return '/os_customer/save/index/save/';
        // here controller_name is manage, action is contact
    }

}
