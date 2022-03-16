@extends('layouts.admin')

@section('title', 'Admin Create Product')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/cdn_select_2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('layouts.inc.content-header', ['name' => 'Product', 'key' => 'Create'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.index') }}" class="btn btn-success float-right">Back</a>
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

                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" placeholder="Nhập giá sản phẩm" name="price">
                            </div>

                            <div class="form-group">
                                <label for="">Chọn danh mục</label>
                                <select class="select2_init js-states form-control">
                                    <option>Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Hình ảnh đại diện</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                    name="feature_image_path">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Hình ảnh chi tiết</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" multiple
                                    name="image_path[]">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung</label>
                                {{-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea> --}}
                                <textarea name="content" class="form-control my-editor" rows="15" name="content">{!! old('content') !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple">
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

@section('js')
    <script src="https://cdn.tiny.cloud/1/ucpkc47hvx80mrf6ntd3rsrl19vg29taofnbu61ittwzw6ih/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('js/tinymce.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
@endsection
