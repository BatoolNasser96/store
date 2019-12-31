@extends('layouts.admin')


@section('content')

        <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/guestbook') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/settings') }}">All Settings</a></li>
                        <li><a href="{{ url('/settings/create') }}">Add Setting</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Laravel Site Settings</h2>
                        </div>

                        <div class="panel-body">
                            <h3>Show Setting</h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Option</th>
                                    <th>Slug</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $setting->id }}</td>
                                        <td>{{ $setting->option }}</td>
                                        <td>{{ $setting->slug }}</td>
                                        <td>{{ $setting->value }}</td>
                                        <td>
                                            <a href="{{ url('/settings/'.$setting->id.'/edit') }}">Edit</a> |
                                            <a href="{{ url('/settings/'.$setting->id) }}">Show</a> |
                                            <a href="{{ url('/settings/'.$setting->id.'/delete') }}">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
             
                </div>
            </div>
        </div>
    </div>
@endsection	