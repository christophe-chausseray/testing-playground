<?php
declare(strict_types=1);

use Domain\Model\Product\ProductId;
use Domain\Model\PurchaseOrder\OrderedQuantity;
use Domain\Model\PurchaseOrder\PurchaseOrder;
use Domain\Model\PurchaseOrder\PurchaseOrderId;
use Domain\Model\ReceiptNote\ReceiptNote;
use Domain\Model\ReceiptNote\ReceiptNoteId;
use Domain\Model\ReceiptNote\ReceiptQuantity;
use Domain\Model\Supplier\SupplierId;
use Ramsey\Uuid\Uuid;

/*
 * First update the schema, run
 *
 * vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
 */

$entityManager = require __DIR__ . '/../config/bootstrap.php';

$purchaseOrder = PurchaseOrder::create(
    PurchaseOrderId::fromString(Uuid::uuid4()->toString()),
    SupplierId::fromString(Uuid::uuid4()->toString())
);
$product1 = ProductId::fromString(Uuid::uuid4()->toString());
$product2 = ProductId::fromString(Uuid::uuid4()->toString());

$purchaseOrder->addLine($product1, new OrderedQuantity(10.0));
$purchaseOrder->addLine($product2, new OrderedQuantity(5.0));
$purchaseOrder->place();

$entityManager->persist($purchaseOrder);
$entityManager->flush();

$receiptNote1 = ReceiptNote::create(ReceiptNoteId::fromString(Uuid::uuid4()->toString()), $purchaseOrder->purchaseOrderId());
$receiptNote1->receive($product1, new ReceiptQuantity(5.0));
$receiptNote1->receive($product2, new ReceiptQuantity(2.0));

$entityManager->persist($receiptNote1);
$entityManager->flush();
