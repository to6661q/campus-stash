<?php

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$writer = new PngWriter();
$qrCode = QrCode::create('Hello, World!');
$result = $writer->write($qrCode);
$result->saveToFile('test.png');
