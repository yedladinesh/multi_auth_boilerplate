@extends('layouts.master')
@section('title')Admin Dashboard @endsection

    @section('content')
    @component('components.breadcrumb')
        @slot('title') Dashboard @endslot
        @slot('li_1') Admin @endslot
        @slot('li_2') Dashboard @endslot
    @endcomponent 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi Admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection