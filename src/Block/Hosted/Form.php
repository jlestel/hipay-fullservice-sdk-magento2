<?php
/*
 * HiPay fullservice SDK
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Apache 2.0 Licence
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * @copyright      Copyright (c) 2016 - HiPay
 * @license        http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 *
 */
namespace HiPay\FullserviceMagento\Block\Hosted;

/**
 *
 * @author kassim
 *        
 */
class Form extends \Magento\Payment\Block\Form {
	
	/**
	 * @var string
	 */
	protected $_template = 'HiPay_FullserviceMagento::form/hosted.phtml';


	
	/**
	 * @param \Magento\Framework\View\Element\Template\Context $context
	 * @param array $data
	 */
	public function __construct(
			\Magento\Framework\View\Element\Template\Context $context,
			array $data = []
			) {
				parent::__construct($context, $data);
	}
	
}
