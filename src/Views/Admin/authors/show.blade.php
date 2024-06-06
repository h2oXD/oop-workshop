@extends('layouts.master')
@section('title')
    Chi tiết tác giả
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
                                    <h4>Chi tiết tác giả</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: white" href="{{ url('admin/authors') }}"><button
                                                    class="btn btn-warning">Danh sách</button></a>

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
                                    <table class="">
                                        <thead>
                                            @foreach ($author as $item => $value)
                                                <tr>
                                                    <th style="max-width: 100px">{{ $item }}</th>
                                                    @if (str_starts_with($item, 'avatar'))
                                                        <th style="max-width: 950px"><img src="{{ $value }}" width="50px" alt=""></th> 
                                                    @else
                                                        <th style="max-width: 950px">{{ $value }}</th>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </thead>
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
