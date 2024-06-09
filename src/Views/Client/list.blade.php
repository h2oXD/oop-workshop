@extends('layouts.master')
@section('title')
    Danh sách
@endsection
@section('content')
    <section class="section sm">
        <h2 class="text-center mb-3">Danh sách bài viết</h2>

        <div class="container">
            <div class="row">
                @foreach ($posts as $item)
                    <div class="col-lg-4 mb-5">
                        <h2 class="h5 section-title"></h2>

                        <article class="card">
                            <div class="post-slider slider-sm">
                                <img src="{{ url($item['thumbnail']) }}" class="card-img-top" alt="post-thumb">
                            </div>

                            <div class="card-body">
                                <h3 class="h4 mb-3"><a class="post-title"
                                        href="{{ url('detail/' . $item['id']) }}">{{ $item['title'] }}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="" class="card-meta-author">
                                            <img src="{{ url($item['a_avatar']) }}">
                                            <span>{{ $item['a_name'] }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ $item['created_at'] }}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="">{{ $item['c_name'] }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <p>{{ $item['excerpt'] }}</p>
                                <a href="{{ url('detail/' . $item['id']) }}" class="btn btn-outline-primary">Đọc thêm</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <ul class="pagination justify-content-center mb-3">
                @php
                    if (!isset($_GET['page'])) {
                        $_GET['page'] = 1;
                    }
                @endphp
                @if (isset($_GET['page']) && $_GET['page'] != 1)
                    <li class="page-item">
                        <a href="{{ url('list/?page=' . ($_GET['page'] - 1)) }}" class="page-link">
                            < </a>
                    </li>
                @endif

                <li class="page-item page-item active">
                    <a class="page-link">{{ $_GET['page'] ?? 1 }}</a>
                </li>
                @if (isset($_GET['page']) && $_GET['page'] < $totalPage)
                    <li class="page-item">
                        <a href="{{ url('list/?page=' . ($_GET['page'] + 1)) }}" class="page-link">></a>
                    </li>
                @endif
            </ul>
            <div style="height: 200px"></div>
        </div>
        </div>
    @endsection
