<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Barcode Product <?= $barang->barcode ?></title>
    <style>        
        #barcode{
            border: 1px solid #000;
            width:30%;
            padding: 5px;
        }

        #logo_pnj{
            width: 30%;
            margin-bottom: 10px;
        }

        #barcodeImage{
            padding: 0;                        
            transform-origin: 40 35;
            transform: rotate(90deg);
        }

    </style>
</head>
<body>
    
    <div id="barcodeImage">
        <img id="logo_pnj" src="assets/dist/img/BannerTIK.png" alt=""><br>        
        <img id="barcode" src="<?= 'data:image/png;base64,'.base64_encode($generator->getBarcode($barang->barcode, $generator::TYPE_CODE_128))?>">
        <br>
        <small><?= $barang->barcode?></small>
    </div>
    
</body>
</html>