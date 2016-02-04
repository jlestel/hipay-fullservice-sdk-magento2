<?php
/*
 * Hipay fullservice SDK
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
namespace Hipay\FullserviceMagento\Controller;

use Magento\Framework\App\Action\Action as AppAction;
use Hipay\FullserviceMagento\Model\Request\Type\Factory;

/**
 *
 * @author kassim
 *        
 */
abstract class Fullservice extends AppAction {
	
	/**
	 * @var \Magento\Customer\Model\Session
	 */
	protected $_customerSession;
	
	/**
	 * @var \Magento\Checkout\Model\Session
	 */
	protected $_checkoutSession;
	
	/**
	 * @var \Magento\Framework\Session\Generic
	 */
	protected $_hipaySession;
    
    /**
     * @var \Magento\Quote\Model\Quote
     */
    protected $_quote = false;
    
    /**
     * 
     * @var \Magento\Framework\Logger\Monolog
     */
    protected $logger;
    
    /**
     * 
     * @var \Hipay\FullserviceMagento\Model\Gateway\Factory
     */
    protected $_gatewayManagerFactory;

    
	
	/**
	 * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * $param \Magento\Framework\Session\Generic $hipaySession,
     * @param \Magento\Framework\Url\Helper\Data $urlHelper
     * @param \Hipay\FullserviceMagento\Model\Checkout\Factory $checkoutFactory
     * @param Factory $requestfactory,
     * @param \Psr\Log\LoggerInterface $logger
	 * {@inheritDoc}
	 *
	 * @see \Magento\Backend\App\AbstractAction::__construct()
	 */
	public function __construct(
			\Magento\Framework\App\Action\Context $context,
			\Magento\Customer\Model\Session $customerSession,
			\Magento\Checkout\Model\Session $checkoutSession,
			\Magento\Framework\Session\Generic $hipaySession,
			\Psr\Log\LoggerInterface $logger,
			\Hipay\FullserviceMagento\Model\Gateway\Factory $gatewayManagerFactory
	) {
		$this->_customerSession = $customerSession;
        $this->_checkoutSession = $checkoutSession; 
        $this->_hipaySession = $hipaySession;

        $this->logger = $logger;
        $this->_gatewayManagerFactory = $gatewayManagerFactory;

        parent::__construct($context);

	}

	
	 /**
     * Return checkout session object
     *
     * @return \Magento\Checkout\Model\Session
     */
    protected function _getCheckoutSession()
    {
        return $this->_checkoutSession;
    }

    /**
     * Return checkout quote object
     *
     * @return \Magento\Quote\Model\Quote
     */
    protected function _getQuote()
    {
        if (!$this->_quote) {
            $this->_quote = $this->_getCheckoutSession()->getQuote();
        }
        return $this->_quote;
    }
    
    /**
     * Hipay session instance getter
     *
     * @return \Magento\Framework\Session\Generic
     */
    protected function _getSession()
    {
    	return $this->_hipaySession;
    }
    
    /**
     * Returns action name which requires redirect
     * @return string
     */
    public function getRedirectActionName()
    {
    	return 'placeOrder';
    }

}