<?php

namespace Os\Customer\Block\Adminhtml\Grid\Column\Renderer\Answer;


use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;

class Link extends AbstractRenderer {

    protected function _construct() {
        parent::_construct();
    }

    public function render(\Magento\Framework\DataObject $row) {
        return '<a href="' . $this->getUrl('*/*/edit', array('ticket_id' => $row->getId())) . '">'.__('Answer').'</a>';
    }

}
