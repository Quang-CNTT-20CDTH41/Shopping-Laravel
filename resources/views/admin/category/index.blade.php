@extends('layouts.admin')

@section('title', 'Admin Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('layouts.inc.content-header', [
            'name' => 'Categories',
            'key' => 'List',
        ])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Create Category</a>
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
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Slug Danh mục</th>
                                    <th class="col-sm-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <form action="{{ route('categories.destroy', [$category]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('categories.edit', [$category]) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
