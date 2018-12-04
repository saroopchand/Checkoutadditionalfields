<?php

namespace Progos\Checkoutadditionalfields\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $connection = $installer->getConnection();
        $connection
            ->addColumn(
                $installer->getTable('quote'),
                'instructions',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'default' => NULL,
                    'length' => 255,
                    'comment' => 'Instructions'
                ]
            );
		$connection
            ->addColumn(
                $installer->getTable('quote_address'),
                'instructions',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'default' => NULL,
                    'length' => 255,
                    'comment' => 'Instructions'
                ]
            );
        $connection
            ->addColumn(
                $installer->getTable('sales_order'),
                'instructions',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'default' => NULL,
                    'length' => 255,
                    'comment' => 'Instructions'
                ]
            );
		$connection
            ->addColumn(
                $installer->getTable('sales_order_address'),
                'instructions',
                [
                    'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    'nullable' => true,
                    'default' => NULL,
                    'length' => 255,
                    'comment' => 'Instructions'
                ]
            );

        $installer->endSetup();
    }
}