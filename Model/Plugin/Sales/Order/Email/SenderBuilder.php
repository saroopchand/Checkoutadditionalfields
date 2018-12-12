<?php

namespace Progos\Checkoutadditionalfields\Model\Plugin\Sales\Order\Email;

use Magento\Sales\Model\Order\Email\Container\Template;

/**
 * Class SenderBuilderPlugin
 */
class SenderBuilder
{

    /**
     * @var Template
     */
    protected $templateContainer;

    /**
     * @param Template $templateContainer
     */
    public function __construct(
        Template $templateContainer
    ) {
        $this->templateContainer = $templateContainer;
    }


    /**
     * @param $subject
     * @param \Closure $proceed
     * @return mixed
     */
    public function aroundSend($subject, \Closure $proceed)
    {

        /*$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('6. SenderBuilder Entered');*/


        $vars = $this->templateContainer->getTemplateVars();
        $order = $vars['order'];
        $order->setAppendInstructions(true);
        $returnValue = $proceed();
        $order->setAppendInstructions(false);
        return $returnValue;
    }
}