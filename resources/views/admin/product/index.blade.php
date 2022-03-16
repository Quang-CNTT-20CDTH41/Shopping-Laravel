@extends('layouts.admin')

@section('title', 'Admin Products')

@section('content')
    <div class="content-wrapper">
        @include('layouts.inc.content-header', ['name' => 'Products', 'key' => 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right">Create Product</a>
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
                                    <th scope="col">Tên sản phẩm </th>
                                    <th scope="col">Giá </th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Danh mục</th>
                                    <th class="col-sm-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($products as $product)
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
                                @endforeach --}}
                            </tbody>
                        </table>
                        {{-- {{ $menus->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
