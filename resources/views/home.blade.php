@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="content-wrapper">
        @include('layouts.inc.content-header', ['name' => 'Admin', 'key' => 'Dashboard'])
    </div>
@endsection
