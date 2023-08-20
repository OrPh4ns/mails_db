@extends('layouts.nav')
@section('title', 'Add Domain')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Domains</h3>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">New Domain</p>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{route('domain_add')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Domain</strong></label><input
                                    class="form-control" type="text" id="domain" placeholder="gmail.con" name="domain">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
