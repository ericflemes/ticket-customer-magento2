<?php
namespace Os\Customer\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Answer extends Container
{
   protected function _construct()
   {
       
       $this->_controller = 'adminhtml_answer';
       $this->_blockGroup = 'Os_Customer';
       $this->_headerText = __('Tickets');
       $this->_addButtonLabel = __('Create New Ticket');
       
       $this->_addBackButton();
       $this->addButton('ticket_id', '');

       parent::_construct();
   }
   
   public function getTicketId($row){
       return $this->getUrl('*/*/edit', array('id' => $row->getId()));
   }
   
}