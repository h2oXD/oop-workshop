@extends('layouts.master')
@section('title')
    Danh sách bài viết
@endsection
@section('content')
    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <div class="white_card_header">

                        </div>
                        <div class="white_card_body">
                            <div class="QA_section">
                                <div class="white_box_tittle list_header">
                                    <h4>Danh sách bài viết</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: white" href="{{ url('admin/posts/create') }}"><button
                                                    class="btn btn-success">Thêm mới</button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    @if (isset($_SESSION['status']) && !empty($_SESSION['status']))
                                        <div class="alert text-white bg-success" role="alert">
                                            <div class="alert-text">{{ $_SESSION['status'] }}</div>
                                        </div>
                                        @php
                                            unset($_SESSION['status']);
                                        @endphp
                                    @endif
                                    <table class="table table-hover lms_table_active ">
                                        <thead>
                                            <tr>
                                                <th class="text-center" scope="col">ID</th>
                                                <th class="text-center" style="min-width: 200px" scope="col">Tiêu đề</th>
                                                <th class="text-center" scope="col">Ảnh bìa</th>
                                                <th class="text-center" scope="col">Danh mục</th>
                                                <th class="text-center" scope="col">Tác giả</th>
                                                <th class="text-center" scope="col">Lượt xem</th>
                                                <th class="text-center" scope="col">Trạng thái</th>
                                                <th class="text-center" scope="col">Is Editors Pick</th>
                                                <th class="text-center" scope="col">Is Trending</th>
                                                <th class="text-center" scope="col">Is Show Home</th>
                                                <th class="text-center" class="d-flex justify-content-center"
                                                    scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $item)
                                                <tr>
                                                    <td class="text-center">{{ $item['id'] }}</td>
                                                    <td class="text-center" style="min-width: 200px">{{ $item['title'] }}
                                                    </td>
                                                    <td><img width="80px" src="{{ asset($item['thumbnail']) }}"
                                                            alt=""></td>
                                                    <td class="text-center">{{ $item['c_name'] }}</td>
                                                    <td class="text-center">{{ $item['a_name'] }}</td>
                                                    <td class="text-center">{{ $item['view'] }}</td>
                                                    <td class="text-center">{!! $item['status'] == 'draft'
                                                        ? '<span class="badge bg-info">Bản nháp</span>'
                                                        : ($item['status'] == 'published'
                                                            ? '<span class="badge bg-primary">Công khai</span>'
                                                            : '') !!}</td>
                                                    <td class="text-center">{!! $item['is_trending']
                                                        ? '<span class="badge bg-success">YES</span>'
                                                        : '<span class="badge bg-warning">NO</span>' !!}</td>
                                                    <td class="text-center">{!! $item['is_show_home']
                                                        ? '<span class="badge bg-success">YES</span>'
                                                        : '<span class="badge bg-warning">NO</span>' !!}</td>
                                                    <td class="text-center">{!! $item['is_editors_pick']
                                                        ? '<span class="badge bg-success">YES</span>'
                                                        : '<span class="badge bg-warning">NO</span>' !!}</td>
                                                    <td class="text-center" style="padding: 40px"
                                                        class="d-flex justify-content-evenly">
                                                        <a style="font-size: 19px"
                                                            href="{{ url('admin/posts/' . $item['id'] . '/show') }}"
                                                            title="Xem chi tiết"><i class="ti-eye ms-2"></i></a>
                                                        <a style="font-size: 19px"
                                                            href="{{ url('admin/posts/' . $item['id'] . '/edit') }}"
                                                            title="Sửa"><i class="ti-pencil ms-2"></i></a>
                                                        <a style="font-size: 19px"
                                                            href="{{ url('admin/posts/' . $item['id'] . '/delete') }}"
                                                            onclick="return confirm('Bạn có chắc muốn xoá')"
                                                            title="Xoá"><i class="ti-close ms-2"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                </div>
            </div>
        </div>
    </div>
@endsection
