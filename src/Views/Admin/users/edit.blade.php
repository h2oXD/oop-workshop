@extends('layouts.master')
@section('title')
    Cập nhật người dùng
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
                                    <h4>Cập nhật người dùng</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: white" href="{{ url('admin/users') }}"><button
                                                    class="btn btn-warning">Danh sách</button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    @if (isset($_SESSION['errors']) && !empty($_SESSION['errors']))
                                        <div class="alert text-white bg-danger" role="alert">
                                            @foreach ($_SESSION['errors'] as $item)
                                                <div class="alert-text"><i class="ti-alert"> </i>{{ $item }}</div>
                                            @endforeach
                                        </div>

                                        @php
                                            unset($_SESSION['errors']);
                                        @endphp
                                    @endif
                                    @if (isset($_SESSION['status']) && !empty($_SESSION['status']))
                                        <div class="alert text-white bg-success" role="alert">
                                            <div class="alert-text">{{ $_SESSION['status'] }}</div>
                                        </div>
                                        @php
                                            unset($_SESSION['status']);
                                        @endphp
                                    @endif
                                    <form action="{{ url('admin/users/' . $user['id'] . '/update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class=" col-md-6">
                                                <label class="form-label">Email</label>
                                                <input value="{{$user['email']}}" type="email" class="form-control" name="email"
                                                    placeholder="Email">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Password</label>
                                                <input disabled type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Họ và tên</label>
                                                <input value="{{$user['fullName']}}" type="text" class="form-control" name="fullName"
                                                    placeholder="FullName">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Vai trò</label>
                                                <select class="form-select" name="role" id="">
                                                    <option @if($user['role'] == 0) selected @endif value="0">Người dùng</option>
                                                    <option @if($user['role'] == 1) selected @endif value="1">Quản trị viên</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Ảnh đại diện</label>
                                                <input type="file" name="avatar" class="form-control">
                                                <img width="80px" src="{{url($user['avatar'])}}" alt="">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </form>
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
