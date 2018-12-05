<?php

namespace Progos\Checkoutadditionalfields\Model\Observer\Adminhtml;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;


/**
 * Class AddHtmlToOrderShippingViewObserver
 */
class AddHtmlToOrderShippingViewObserver implements ObserverInterface
{

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_helper;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_block;

    /**
     * @param \Magento\Framework\View\Element\Template $block
     */
    public function __construct(
        \Magento\Framework\View\Element\Template $block
    )
    {
        $this->_block = $block;
    }

    /**
     * @param EventObserver $observer
     */
    public function execute(EventObserver $observer)
    {
        if($observer->getElementName() == 'order_shipping_view')
        {
            $orderShippingViewBlock = $observer->getLayout()->getBlock($observer->getElementName());
            $order = $orderShippingViewBlock->getOrder();

            $instructions = $order->getInstructions();

            $instructionsBlock = $this->_block;
            $instructionsBlock->setInstructions($instructions);
            $instructionsBlock->setTemplate('Progos_Checkoutadditionalfields::order_info_shipping_info.phtml');

            $html = $observer->getTransport()->getOutput() . $instructionsBlock->toHtml();
            $observer->getTransport()->setOutput($html);
        }
    }
}