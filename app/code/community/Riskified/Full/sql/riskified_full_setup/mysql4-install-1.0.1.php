<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$helper = Mage::helper('full/order_status');

Mage::getModel('sales/order_status')
    ->setStatus($helper->getOnHoldStatusCode())->setLabel($helper->getOnHoldStatusLabel())
    ->assignState(Mage_Sales_Model_Order::STATE_HOLDED)
    ->save();

$installer->endSetup();
