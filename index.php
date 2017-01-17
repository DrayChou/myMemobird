<?php
require 'vendor/autoload.php';

use Atans\Memobird\Content\PrintContent;
use Atans\Memobird\Memobird;

$config = require_once "config.php";

$memobird = new Memobird($config['key']);

$memobirdId = $config['memobird_id'];

$printContent = new PrintContent();

// Set font
// 设置字体
// $printContent->setFont('path/to/font.ttf');

// Add a text
// 增加一段文字
$printContent->addText('Hello World');

// Add text twice
// 重复加文字
$printContent->addText('Hello World')
    ->addText('Add another text');

// Add an photo
// 增加相片
$printContent->addPhoto('/Users/dray/Documents/1481224382162193652.jpg');

// Add photo twice
// 增加多张相片
$printContent->addPhoto('/Users/dray/Documents/1481224382162193652.jpg')
    ->addPhoto('/Users/dray/Documents/1481224382162193652.jpg');

// Add an photo from image resource
// 增加相片资源后的内容
$photoContent = file_get_contents('/Users/dray/Documents/1481224382162193652.jpg');
$printContent->addPhoto($photoContent);

// Add text and photo
// 增加文字和图片
$printContent->addText('Hello World')
    ->addPhoto('/Users/dray/Documents/1481224382162193652.jpg');

// Add a text image
// 增加文字图
$printContent->addTextImage('Hello world');
// or
$printContent->addTextImage('Hello world', [
    'align' => PrintContent::ALIGN_CENTER,
    // 'font' => 'path/to/font.ttf',
    // ... more option please see src/Memobird/Content/PrintContent.php
    // ... 更多设置请看 src/Memobird/Content/PrintContent.php
]);

// Add a line
// 加一条线
$printContent->addLine();

// Add a Qr Code
// 增加 二维码
$printContent->addQrCode('http://memobird.cn');
// $printContent->addQrCode('http://memobird.cn', [
// 'logo' => '/Users/dray/Documents/1481224382162193652.jpg',
// ... more option please see src/Memobird/Content/PrintContent.php
// ... 更多设置请看 src/Memobird/Content/PrintContent.php
// ]);

// Add printed time
// 加列印时间
$printContent->addPrintedTime('http://memobird.cn');

// Remove all content
// 刪除所有內容
// $printContent->removeAll();

// Print
// 打印
$printPaperResult = $memobird->printPaper($memobirdId, $printContent);
var_dump($printPaperResult);

// Get print status
// 取得打印状态
$printStatusResult = $memobird->getPrintStatus($printPaperResult->getPrintcontentid());
var_dump($printStatusResult);
