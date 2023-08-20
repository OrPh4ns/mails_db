@extends('layouts.nav')
@section('title', 'Home')
@section('content')

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="alert alert-success" role="alert"><span><strong>Alert</strong> text.</span></div>
        <div class="row mb-3">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">User Settings</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('edit_info')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Name</strong></label><input
                                                        class="form-control" type="text" id="first_name"
                                                        placeholder="John Othman .." value="{{$user->name}}" name="name"></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Email
                                                        Address</strong></label><input class="form-control" type="email"
                                                                                       value="{{$user->email}}"
                                                                                       placeholder="user@example.com"
                                                                                       name="email"></div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="mb-3"><label class="form-label" for="username"><strong>Created
                                                    at</strong>
                                                {{$user->created_at}}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-sm" type="submit">Save Settings</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Password</p>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label"
                                                                     for="username"><strong>Password</strong></label><input
                                                    class="form-control" type="text" id="pass" placeholder="Password"
                                                    name="pass"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>Password
                                                        again</strong></label><input class="form-control" type="email"
                                                                                     id="pass1"
                                                                                     placeholder="Password Again"
                                                                                     name="pass2"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary btn-sm" type="submit">Save Password</button>
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
