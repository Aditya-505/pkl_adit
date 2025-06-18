<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($a)
    Promo untuk : <b>{{$a}}</b> <br>
    @if($b)
    Kode promo : <b>{{$b}}</b> <br>
    @endif
    @else
    semua promo barang 
    @endif
</body>
</html>