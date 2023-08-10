<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Emalils</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-md bg-body">
    <div class="container-fluid"><a class="navbar-brand" href="#">Mail<span style="color: rgb(255, 0, 0);">DB</span>
            Or<span style="color: rgb(255, 0, 0);">P</span>h4ns</a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Emails</a></li>
                <li class="nav-item"><a class="nav-link" href="/filter">Filter</a></li>
                <li class="nav-item"><a class="nav-link" href="/checker">Tpyes Checker</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mb-2 mt-2">
    <form method="post" action="{{route('search')}}">
        @csrf
        <input class="form-control" type="text" name="email" placeholder="Email ..">
        <button class="btn btn-success mt-2" type="submit">Search</button>
    </form>
</div>
<div class="container mb-2 mt-2">
    @if(session()->has('success'))
        <div class="alert alert-danger text-success text-bg-success alert-dismissible"
             role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            <h4 class="alert-heading text-white">{{session('success')}}</h4>
        </div>
    @endif
    <h1>Total : <span style="color: rgb(6, 140, 59);">{{count($emails)}}</span></h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Filtert_At</th>
                <th>Found Count</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emails as $email)
                <tr>
                    <td>{{$email->id}}</td>
                    <td>{{$email->email}}</td>
                    <td>{{$email->created_at}}</td>
                    <td><strong>{{$email->found+1}}</strong></td>
                    <td><a onclick="return confirm('Are you sure you want to delete this item?')" href="/email/delete/{{$email->id}}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <nav>
        <ul class="pagination">
            @if($prev)
                <li class="page-item"><a class="page-link" aria-label="Previous" href="/emails/{{$current-1}}"><span aria-hidden="true">«</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="/emails/{{$current-1}}">{{$current-1}}</a></li>
            @endif
            <li class="page-item active"><a class="page-link" href="/emails/{{$current}}">{{$current}}</a></li>
            @if($next)
                <li class="page-item"><a class="page-link" href="/emails/{{$current+1}}">{{$current+1}}</a></li>
                <li class="page-item"><a class="page-link" aria-label="Next" href="/emails/{{$current+1}}"><span aria-hidden="true">»</span></a>
            @endif
            </li>
        </ul>
    </nav>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
