@extends('layouts.nav')
@section('title', 'Home')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Emails</h3>
        <div class="card shadow border-start-primary py-2 w-25 mb-2">
            <div class="card-body">
                <div class="row align-items-center no-gutters">
                    <div class="col me-2">
                        <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="font-size: 20.2px;">Emails count</span>
                        </div>
                        <div class="text-dark fw-bold h5 mb-0"><span style="font-size: 31px;"><span
                                    style="color: rgb(20, 129, 136);">{{$count}}</span></span></div>
                    </div>
                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Emails</p>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-danger text-success text-bg-success alert-dismissible"
                         role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        <h4 class="alert-heading text-white">{{session('success')}}</h4>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <select class="form-select w-25">
                                    <optgroup label="This is a group">
                                        <option value="12" selected="">This is item 1</option>
                                        <option value="13">This is item 2</option>
                                        <option value="14">This is item 3</option>
                                    </optgroup>
                                </select>
                                <button class="btn btn-primary py-0" type="button"
                                        style="background: var(--bs-purple);"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="border-start-primary" style="border-width: 1px;"></div>
                        <form method="post" action="{{route('search')}}"
                              class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            @csrf
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text"
                                       placeholder="Search for ..." name="search">
                                <button class="btn btn-primary py-0" type="submit"
                                        style="background: var(--bs-purple);"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Found At</th>
                            <th>Found Count</th>
                            <th>Stop</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($emails as $email)
                            <tr>
                                <td>{{$email->id}}</td>
                                <td>{{$email->email}}</td>
                                <td>{{$email->created_at}}</td>
                                <td><strong>{{$email->found+1}}</strong></td>
                                <td class="fas fa-trash text-white"><a class="btn btn-danger btn-circle ms-1"
                                                                       onclick="return confirm('Are you sure you want to delete this item?')"
                                                                       href="/email/delete/{{$email->id}}"><i
                                            class="fas fa-trash text-white"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Found At</strong></td>
                            <td><strong>Found Count</strong></td>
                            <td><strong>Stop</strong></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center"></div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                @if($prev)
                                    <li class="page-item"><a class="page-link" aria-label="Previous"
                                                             href="/emails/{{$current-1}}"><span
                                                aria-hidden="true">«</span></a></li>
                                    <li class="page-item"><a class="page-link"
                                                             href="/emails/{{$current-1}}">{{$current-1}}</a></li>
                                @endif
                                <li class="page-item active"><a class="page-link"
                                                                href="/emails/{{$current}}">{{$current}}</a></li>
                                @if($next)
                                    <li class="page-item"><a class="page-link"
                                                             href="/emails/{{$current+1}}">{{$current+1}}</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next"
                                                             href="/emails/{{$current+1}}"><span
                                                aria-hidden="true">»</span></a>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
