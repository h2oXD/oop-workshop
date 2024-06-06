@extends('layouts.master')
@section('title')
    Danh sách người dùng
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
                                <h4>Danh sách người dùng</h4>
                                <div class="box_right d-flex align-items-center lms_block">
                                    <div class="add_button ms-2 me-2">
                                        <a style="color: white" href="{{url('admin/users/create')}}"><button class="btn btn-success">Thêm mới</button></a>
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
                                            <th scope="col">ID</th>
                                            <th scope="col">Họ và tên</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Upadeted at</th>
                                            <th class="d-flex justify-content-center" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                        <tr>                                   
                                            <td>{{$item['id']}}</td>
                                            <td>{{$item['fullName']}}</td>
                                            <td><img width="50px" src="{{url($item['avatar'])}}" alt="avatar"></td>
                                            <td>{{$item['email']}}</td>
                                            <td>{!!$item['role'] ? '<span class="badge bg-danger">Admin</span>' : '<span class="badge bg-secondary">Member</span>'!!}</td>
                                            <td>{{$item['created_at']}}</td>
                                            <td>{{$item['updated_at']}}</td>
                                            <td>
                                                <a href="{{url('admin/users/'.$item['id'].'/show')}}" title="Xem chi tiết" ><i class="ti-eye ms-2"></i></a>
                                                <a href="{{url('admin/users/'.$item['id'].'/edit')}}" title="Sửa" ><i class="ti-pencil ms-2"></i></a>
                                                <a href="{{url('admin/users/'.$item['id'].'/delete')}}" onclick="return confirm('Bạn có chắc muốn xoá')" title="Xoá" ><i class="ti-close ms-2"></i></a>
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