@extends('layouts.master')
@section('title')
    Cập nhật tác giả
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
                                    <h4>Cập nhật tác giả</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: white" href="{{ url('admin/authors') }}"><button
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
                                    <form action="{{ url('admin/authors/'.$author['id'].'/update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">

                                            <div class="col-md-6">
                                                <label class="form-label">Họ và tên</label>
                                                <input value="{{$author['name']}}" type="text" class="form-control" name="name"
                                                    placeholder="Name">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Ảnh đại diện</label>
                                                <input type="file" name="avatar" class="form-control">
                                                <img width="80px" src="{{url($author['avatar'])}}" alt="">
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
