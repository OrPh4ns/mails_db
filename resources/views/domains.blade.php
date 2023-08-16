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

    <div class="container">
        <h1>Email Types Checker</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Emails Count</th>
                    <th>Found_At</th>
                    <th>Update/Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($domains as $domain)
                    <tr>
                        <td>{{$domain->id}}</td>
                        <td>{{$domain->type}}</p> </td>
                        <td>{{$domain->count}}</td>
                        <td>{{$domain->created_at}}</td>
                        <td><a href="/domain/delete/{{$domain->id}} " onclick="confirm('Are you sure?')">Delete</a> / <a href="/domain/update/{{$domain->id}}">Update</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <form>
            <button class="btn btn-dark mb-2" type="button">Check</button>
        </form>
        <div class="alert alert-success" role="alert"><span><strong>Alert</strong> text.</span></div>
        <ul class="list-group">
            <li class="list-group-item w-25"><span>List Group Item 1</span></li>
            <li class="list-group-item w-25"><span>List Group Item 1</span></li>
            <li class="list-group-item w-25"><span>List Group Item 1</span></li>
        </ul>
    </div>
    <div class="container mt-2">
        <h1>Adding new Domain</h1>
        <form method="post" action="{{route('type_add')}}">
            <input type="text" class="mb-2" name="domain" placeholder="Domain ..">
            <button class="btn btn-secondary mx-2" type="submit">Add</button>
        </form>
    </div>

</div>
<script>
    function update()
    {
        alert(1);
    }
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
