@extends('layouts.nav')
@section('title', 'Filter')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Domains</h3>
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <form method="post" action="{{route('domains_check')}}">
                    @csrf
                    <button class="btn btn-primary" name="check" type="submit">Check</button>
                </form>
            </div>
            @include('components.success')
        </div>
        @if(isset($domains))
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Domains</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h1>Domains Count: <span style="color: rgb(20, 129, 136);">{{count($domains)}}</span></h1>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid"
                         aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Domain</th>
                                <th>Created At</th>
                                <th>Emails Count</th>
                                <th>Valid</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($domains as $domain)
                                <tr>
                                    <td><strong>{{$domain->id}}</strong></td>
                                    <td>{{$domain->type}}</td>
                                    <td>{{$domain->created_at}}</td>
                                    <td>{{$domain->count}}</td>
                                    <td class="fas fa-trash text-white"><a class="btn btn-success btn-circle ms-1"
                                                                           onclick="return confirm('Are you sure you want to delete this item?')"
                                                                           href="/domain_valid/{{$domain->id}}">O</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td><strong>ID</strong></td>
                                <td><strong>Domain</strong></td>
                                <td><strong>Created At</strong></td>
                                <td><strong>Emails Count</strong></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
