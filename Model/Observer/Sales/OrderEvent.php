<?php
namespace Progos\Checkoutadditionalfields\Model\Observer\Sales;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

class OrderEvent implements ObserverInterface{

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectmanager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectmanager){
        $this->_objectManager = $objectmanager;
    }

    /**
     * @param EventObserver $observer
     * @return $this
     */

    public function execute(\Magento\Framework\Event\Observer $observer){
        /*$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('invoke function is calling-----------+++++');*/


        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('3.OrderEvent Entered');

        $order = $observer->getOrder();
        $quoteRepository = $this->_objectManager->create('Magento\Quote\Model\QuoteRepository');
        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $quoteRepository->get($order->getQuoteId());
        $order->setInstructions( $quote->getInstructions() );

        return $this;
    }
}