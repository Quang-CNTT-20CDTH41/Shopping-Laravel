@extends('layouts.admin')

@section('title', 'Admin Create Category')

@section('content')
    <div class="content-wrapper">
        @include('layouts.inc.content-header', [
            'name' => 'Categories',
            'key' => 'List',
        ])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.index') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <div class="col-md-12 mt-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn danh mục cha</label>
                                <select class="form-control" id="" name="parent_id">
                                    <option value="0">Tạo mới danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
