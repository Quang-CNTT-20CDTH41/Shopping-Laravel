@extends('layouts.admin')

@section('title', 'Admin Menus')

@section('content')
    <div class="content-wrapper">
        @include('layouts.inc.content-header', ['name' => 'Menus', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right">Create Menu</a>
                    </div>
                    <div class="col-md-12 mt-3">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên menu</th>
                                    <th class="col-sm-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <th scope="row">{{ $menu->id }}</th>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            <form action="{{ route('menus.destroy', [$menu]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('menus.edit', [$menu]) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $menus->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
