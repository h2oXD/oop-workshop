@extends('layouts.master')
@section('title')
    Dasboard
@endsection
@section('content')
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">

            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-8 card_height_100">
                    <div class="white_card mb_20">
                        <div class="white_card_header">
                            <div class="box_header m-0">
                                <div class="main-title">
                                    <h2 class="m-0">Tổng số bài viết : {{$total_post['total']}} bài</h2>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <h3>Thông kê bài biết theo danh mục </h3>
                            <table class="table">
                                <tr>
                                    <th>Danh mục</th>
                                    <th>Số lượng bài</th>
                                </tr>

                                @foreach ($count_post as $item)
                                    <tr>
                                        @foreach ($categories as $value)
                                            @if ($value['id'] == $item['category_id'])
                                                <td>{{ $value['name'] }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $item['post_count'] }}</td>
                                    </tr>
                                @endforeach


                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
