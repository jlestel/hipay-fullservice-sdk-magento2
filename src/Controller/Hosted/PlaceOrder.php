<?php
/*
 * Hipay fullservice Magento2
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @copyright      Copyright (c) 2016 - Hipay
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 *
 */
namespace Hipay\FullserviceMagento\Controller\Hosted;



class PlaceOrder extends \Hipay\FullserviceMagento\Controller\Fullservice
{	


    /**
     * Submit the order
     *
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
    	ini_set('display_errors', 1);
    	error_reporting(E_ALL | E_STRICT);
    	//die(ini_get('memory_limit'));
        try {
        	
        	
        	
            $order = $this->_getCheckoutSession()->getLastRealOrder();
			
           if(!$order->getId()){
            	throw new \Magento\Framework\Exception\LocalizedException(
            			__('We can\'t place the order.')
            			);
            }
           
            $gateway = $this->_gatewayManagerFactory->create($order);
        	
            $hppModel = $gateway->requestHostedPaymentPage();
            
            //@TODO catch sdk exception

            $this->getResponse()->setRedirect($hppModel->getForwardUrl());
            return;


        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            $this->messageManager->addExceptionMessage(
                $e,
                $e->getMessage()
            );

        } catch (\Exception $e) {
        	$this->logger->addDebug($e->getMessage());
        	$this->messageManager->addErrorMessage($e->getMessage());
            $this->messageManager->addExceptionMessage(
                $e,
                __('We can\'t place the order.')
            );
          
        }
        $this->_redirect('checkout/cart');
    }


 
}