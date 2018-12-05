<?php

namespace Progos\Checkoutadditionalfields\Model\Plugin\Sales;

/**
 * Class Order
 */
class Order
{

    public $helper;
    public $request;

    /**
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        //$this->helper = $helper;
        $this->request = $request;
    }

    /**
     * @param $order
     * @param $result
     * @return string
     */
    public function afterGetShippingDescription($order, $result)
    {
        $isFrontOrderView =
             $this->request->getActionName() == 'view'
            && $this->request->getModuleName() == 'sales';

        if( ($order->getAppendInstructions() && $order->getInstructions())
                || $isFrontOrderView
        )
        {

        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info('5.Order Entered');

//            return  $result .
//                    ", " . __('Instructions - --- ').$order->getInstructions();
        }
        return $result;
    }
}