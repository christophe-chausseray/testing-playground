<?php

declare(strict_types=1);

namespace WareHouse\Application\ReceiveReceiptNote;

/**
 * {description}
 *
 * @author    Samir Boulil <samir.boulil@akeneo.com>
 * @copyright 2018 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ReceiveReceiptNote
{
    public const QUANTITY_RECEIVED = 'quantity_received';
    public const PRODUCT_ID = 'product_id';

    /** @var string */
    public $purchaseOrderId;

    /** @var array */
    public $lines;
}