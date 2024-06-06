@extends('layouts.master')
@section('title')
    Cập nhật bài viết
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
                                    <h4>Cập nhật bài viết</h4>
                                    <div class="box_right d-flex align-items-center lms_block">
                                        <div class="add_button ms-2 me-2">
                                            <a style="color: white" href="{{ url('admin/posts') }}"><button
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
                                    <form action="{{ url('admin/posts/' . $post['id'] . '/update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Tiêu đề</label>
                                                <input value="{{ $post['title'] }}" type="text" class="form-control"
                                                    name="title" placeholder="Title">
                                            </div>
                                            <div class=" col-md-3">
                                                <label class="form-label">Danh mục</label>
                                                <select class="form-select" name="category_id" id="">
                                                    <option value="">Chọn-Danh-Mục</option>
                                                    @foreach ($categories as $item)
                                                        <option @if ($post['category_id'] == $item['id']) selected @endif
                                                            value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class=" col-md-3">
                                                <label class="form-label">Tác giả (author)</label>
                                                <select class="form-select" name="author_id" id="">
                                                    <option value="">Chọn-Tác-Giả</option>
                                                    @foreach ($authors as $item)
                                                        <option @if ($post['author_id'] == $item['id']) selected @endif
                                                            value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Mô tả ngắn</label>
                                                <input value="{{ $post['excerpt'] }}" type="text" class="form-control"
                                                    name="excerpt" placeholder="Excerpt">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Trạng thái (status)</label>
                                                <select class="form-select" name="status" id="">
                                                    <option @if ($post['status'] == 'draft') selected @endif
                                                        value="draft">Nháp (Draft)</option>
                                                    <option @if ($post['status'] == 'published') selected @endif
                                                        value="published">Công khai (Published)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Ảnh bìa</label>
                                                <input type="file" name="thumbnail" class="form-control">
                                                <img width="80px" src="{{ asset($post['thumbnail']) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <input @if($post['is_show_home'] == 1) checked @endif value="1" name="is_show_home" class="form-check-input"
                                                    type="checkbox">
                                                <label class="form-label" for="">Is Show Home</label><br>
                                                <input @if($post['is_trending'] == 1) checked @endif value="1" name="is_trending" class="form-check-input"
                                                    type="checkbox">
                                                <label class="form-label" for="">Is Trending</label><br>
                                                <input @if($post['is_editors_pick'] == 1) checked @endif value="1" name="is_editors_pick" class="form-check-input"
                                                    type="checkbox">
                                                <label class="form-label" for="">Is Editors Pick</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Thẻ (tags)</label>
                                                <select name="tags[]" class="form-select" multiple>
                                                    @foreach ($tags as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Nội dung</label><br>
                                                <textarea class="form-control" name="content" maxlength="255" id="post_content" rows="10">{{$post['content']}}</textarea>
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
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.1.1/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#post_content',
            height: 500,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
@endsection
