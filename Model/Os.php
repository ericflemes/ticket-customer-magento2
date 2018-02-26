<?php

namespace Os\Customer\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

class Os extends AbstractModel implements IdentityInterface {

    const CACHE_TAG = 'os_customer_create';

    protected $_cacheTag = 'os_customer_create';
    protected $_eventPrefix = 'os_customer_create';

    protected function _construct() {
        $this->_init('Os\Customer\Model\ResourceModel\Os');
    }

    public function getIdentities() {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues() {
        $values = [];
        return $values;
    }

}
