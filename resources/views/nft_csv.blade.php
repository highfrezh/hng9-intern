<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <br>
    <center>
        <form action="{{ route('nft.csv') }}" method="POST" name="nft_csv" enctype="multipart/form-data">@csrf
            <Label>Import NFT CSV</Label><br><br>
            <input type="file" name="nft_csv"><br><br>
            <button type="submit">Submit</button>
        </form>
    </center>

</body>

</html>