<?php

namespace Progos\Checkoutadditionalfields\Model\Observer\Adminhtml;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class SaveInstructionsToQuote
 */
class SaveInstructionsToQuote implements ObserverInterface
{


    /**
     * @param EventObserver $observer
     */
    public function execute(EventObserver $observer)
    {
        $instructions = $observer->getRequestModel()->getParam('instructions');
        if($instructions)
        {
            $quote = $observer->getOrderCreateModel()->getQuote();
            $quote->setInstructions($instructions);
        }
    }

}