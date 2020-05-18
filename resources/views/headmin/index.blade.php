@extends('layouts.headmin')

<style type="text/css">


    .buttons .icon {
        margin-top:35px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Willkommen <span style="text-transform: capitalize; font-weight: 600;">{{ Auth::user()->name }}</span><br /></h3>

                    <h3></h3>


            </div>


        </div>
    </div>
</div>
@endsection
