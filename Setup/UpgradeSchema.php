<?php

namespace Os\Customer\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface {

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
                ->newTable($installer->getTable('support_tickets'))
                ->addColumn('ticket_id', Table::TYPE_SMALLINT, null, ['identity' => true, 'nullable' => false, 'primary' => true], 'Ticket ID')
                ->addColumn('entity_id', Table::TYPE_SMALLINT, null, ['nullable' => false], 'Ticket ID')
                ->addColumn('title', Table::TYPE_TEXT, 255, ['nullable' => false], 'Ticket Title')
                ->addColumn('description', Table::TYPE_TEXT, '2M', [], 'Ticket Description')
                ->addColumn('answer', Table::TYPE_TEXT, '2M', [], 'Ticket Answer')
                ->addColumn('is_active', Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Is Ticket Active?')
                ->addColumn('creation_date', Table::TYPE_DATE, null, ['nullable' => false], 'Creation Date')
                ->setComment('Support Tickets');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }

}
