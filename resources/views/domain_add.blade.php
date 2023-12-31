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
                @include('components.errors')
                <form method="post" action="{{route('domain_add')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label"
                                                     for="domain"><strong>Domain</strong></label><input
                                    class="form-control" type="text" id="domain" placeholder="gmail.con" name="domain">
                            </div>
                            <div class="mb-3"><label class="form-label"
                                                     for="country"><strong>Country</strong></label><input
                                    class="form-control" type="text" placeholder="ex. de" name="country">
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
