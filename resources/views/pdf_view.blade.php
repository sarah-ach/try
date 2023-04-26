<html>
<head>
<title>Laravel Create & Download Pdf Tutorial</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <br/>
        <a href="{{ route('pdfview',['download'=>'pdf']) }}" class="btn btn-primary">Download PDF</a>
        <table class="table table-bordered">
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Model</th>
                <th>Sku</th>
            </tr>
            @foreach ($trasabilite as $index=>$product)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $product->splice_name }}</td>
               
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>