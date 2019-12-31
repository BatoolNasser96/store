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
                            <h3>Add New Setting</h3>
                            <form id="contactForm" action="{{ url('/settings') }}" method="POST">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger mt-4" id="contactError">
                                        <p><strong>Error!</strong> Problem saving setting.</p>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Option *</label>
                                    <input type="text" value="{{ old('option') }}" maxlength="100" class="form-control" name="option" id="option" placeholder="Option">
                                </div>

                                <div class="form-group">
                                    <label>Slug *</label>
                                    <input type="text" value="{{ old('slug') }}" maxlength="100" class="form-control" name="slug" id="slug" placeholder="Slug">
                                </div>

                                <div class="form-group">
                                    <label>Value *</label>
                                    <textarea maxlength="5000" rows="8" class="form-control" name="value" id="value" placeholder="Value">{{ old('value') }}</textarea>
                                </div>

                                <input type="submit" value="Send Setting" class="btn btn-primary">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection	