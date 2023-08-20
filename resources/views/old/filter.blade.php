<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Filter Mails</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body>
@include('nav')
<div class="container mb-2">
    <form method="post" action="{{route('filter_post')}}">
        @csrf
        <label class="form-label">Emails list</label>
        <textarea name="emails" class="form-control"></textarea>
        <button class="btn btn-success mt-2" type="submit">Filter</button>
    </form>
</div>

@if(isset($count))
    <div class="container">
        <h1>Emails Count : <span style="color: rgb(0, 255, 25);">{{$count}}</span></h1>
        <h1>New Emails : <span style="color: rgb(65,76,206);">{{count($new_emails)}}</span></h1>
        <h1>Exists Emails : <span style="color: rgb(206,65,86);">{{count($exist_emails)}}</span></h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>New Emails</th>
                    <th>Exsisting Emails</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <ul class="list-group">
                            @foreach($new_emails as $k => $new_email)
                                <li class="list-group-item">{{$k}} - <span>{{$new_email}}</span></li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul class="list-group">
                            @foreach ($exist_emails as $k => $exist_email)
                                <li class="list-group-item">{{$k}} - <span>{{$exist_email}}</span></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr></tr>
                </tbody>
            </table>
        </div>
@endif


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
