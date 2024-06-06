@extends('layouts.master')
@section('title')
    Chi tiết thẻ (tag)
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
                                    <h4>Chi tiết thẻ (tag)</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <button class="btn btn-warning"><a style="color: black" href="{{ url('admin/tags') }}">Danh sách</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="QA_table mb_30">
                                    <table>
                                        @foreach ($tag as $item => $value)
                                        <tr>
                                            <th>{{$item}}</th>
                                            <th>{{$value}}</th>
                                        </tr>
                                        @endforeach
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