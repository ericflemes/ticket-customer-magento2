<?php

namespace Os\Customer\Model\ResourceModel\Os;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {

    protected $_idFieldName = 'ticket_id';
    protected $_eventPrefix = 'os_customer_os_collection';
    protected $_eventObject = 'os_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct() {
        $this->_init('Os\Customer\Model\Os', 'Os\Customer\Model\ResourceModel\Os');
    }

}
