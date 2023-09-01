@extends('layouts.nav')
@section('title', 'Filter')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Email list filtering</h3>
        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Filtering</p>
                            </div>
                            <div class="card-body">
                                @if(isset($count))
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow border-start-warning mb-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-dark fw-bold h5 mb-0">
                                                                <h1>All Count : <span style="color: rgb(11,175,46);">{{$count}}</span></h1>
                                                                <h1>New Emails : <span style="color: rgb(65,76,206);">{{count($new_emails)}}</span></h1>
                                                                <h1>Exists Emails : <span style="color: rgb(206,65,86);">{{count($exist_emails)}}</span></h1>
                                                                <h1>Invalid Emails : <span style="color: rgb(255,75,0);">{{$invalid_emails}}</span></h1>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto"><i
                                                                class="fas fa-chart-bar fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card shadow border-start-warning mb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th>New Emails</th>
                                                                <th>Found Counts</th>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <form method="post" action="{{route('filter_post')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="country"><strong>Country
                                                        list</strong></label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>

                                            </div>

                                            <div class="mb-3"><label class="form-label" for="emails"><strong>Email
                                                        list</strong></label><textarea name="emails" class="form-control"
                                                                                       style="height: 210px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
