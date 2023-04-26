<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF Laravel 9 - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>
<style type="text/css">
    h2{
        text-align: center;
        font-size:22px;
        margin-bottom:50px;
    }
    body{
        background:#f2f2f2;
    }
    .section{
        margin-top:30px;
        padding:50px;
        background:#fff;
    }
    .pdf-btn{
        margin-top:30px;
    }
</style>    
<body>
<div class="container">
        <br/>
        {{request()->get('id_operateur')}}
        {{request()->get('splice_name')}}
        {{request()->get('location')}}
        {!! QrCode::size(50)->generate(request()->get('splice_name')) !!}
        <div class="card">
        
    </div>


</body>
</html>