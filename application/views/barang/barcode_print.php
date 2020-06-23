<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?= $barang->barcode ?></title>
    <style>
        body{
            margin:0;
            padding: 0;
        }
        img{
            border: 1px solid #000;
            width:30%;
            padding: 5px;
        }
    </style>
</head>
<body>
    
    <img src="<?= 'data:image/png;base64,'.base64_encode($generator->getBarcode($barang->barcode, $generator::TYPE_CODE_128))?>">
    <br>
    <small><?= $barang->barcode?></small>
    
</body>
</html>