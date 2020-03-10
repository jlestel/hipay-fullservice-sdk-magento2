<?php
/**
 * HiPay Fullservice Magento
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
namespace HiPay\FullserviceMagento\Model\Method;


/**
 * Multibanco Model payment method
 *
 * @package HiPay\FullserviceMagento
 * @author Jean-Baptiste Louvet <jlouvet@hipay.com>
 * @copyright Copyright (c) 2020 - HiPay
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache 2.0 Licence
 * @link https://github.com/hipay/hipay-fullservice-sdk-magento2
 */
class Multibanco extends AbstractMethodAPI
{
    const HIPAY_METHOD_CODE = 'hipay_multibanco';

    /**
     * @var string
     */
    protected static $_technicalCode = 'multibanco';

    /**
     * @var string
     */
    protected $_code = self::HIPAY_METHOD_CODE;
}
