<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Domains</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
@include('nav')
<div class="container mb-2 mt-2">
    <div class="container mt-2">
        <h1>Adding new Domain</h1>
        <form method="post" action="{{route('domain_add')}}">
            @carf
            <input type="text" class="mb-2" name="domain" placeholder="Domain ..">
            <button class="btn btn-secondary mx-2" type="submit">Add</button>
        </form>
    </div>

</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
