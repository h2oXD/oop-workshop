@extends('layouts.master')
@section('title')
    Thêm mới thẻ (tag)
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
                                    <h4>Thêm mới thẻ (tag)</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: black"
                                                    href="{{ url('admin/tags') }}"><button class="btn btn-warning">Danh sách</button></a>
                                        </div>
                                    </div>
                                </div>
                                @if (isset($_SESSION['errors']) && !empty($_SESSION['errors']))
                                    @foreach ($_SESSION['errors'] as $item)
                                        <div class="alert text-white bg-danger" role="alert">
                                            <div class="alert-text"><i class="ti-alert"> </i>{{$item}}</div>
                                        </div>
                                    @endforeach
                                    @php
                                        unset($_SESSION['errors']);
                                    @endphp
                                @endif
                                <div class="QA_table mb_30">
                                    <form action="{{ url('admin/tags/store') }}" method="post">
                                        @csrf
                                        <h6>Name (*)</h6>
                                        <input type="text" class="form-control" name="name" id="inputText"
                                            placeholder="Tên thẻ (tag)"><br>
                                        <button class="btn btn-success" type="submit">Thêm mới</button>
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
