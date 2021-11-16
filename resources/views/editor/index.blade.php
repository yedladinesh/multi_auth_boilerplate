@extends('layouts.master')
@section('title')Editor Dashboard @endsection

    @section('content')
    @component('components.breadcrumb')
        @slot('title') Dashboard @endslot
        @slot('li_1') Editor @endslot
        @slot('li_2') Dashboard @endslot
    @endcomponent 

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        Hi there, awesome editor
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection