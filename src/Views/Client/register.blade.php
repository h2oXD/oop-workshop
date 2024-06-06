@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="mt-5 col-lg-6">
                    @if (isset($_SESSION['errors']) && !empty($_SESSION['errors']))
                        @foreach ($_SESSION['errors'] as $item)
                            <div class="alert text-white bg-danger" role="alert">
                                <div class="alert-text"><i class="ti-alert"> </i>{{ $item }}</div>
                            </div>
                        @endforeach
                        @php
                            unset($_SESSION['errors']);
                        @endphp
                    @endif
                    @if (isset($_SESSION['success']) && !empty($_SESSION['success']))
                        <div class="alert text-white bg-success" role="alert">
                            <div class="alert-text">{{ $_SESSION['success'] }}</div>
                        </div>
                        @php
                            unset($_SESSION['success']);
                        @endphp
                    @endif
                    <form action="{{ url('handle-register') }}" method="post">
                        <h2>Đăng ký</h2>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" name="fullName" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Địa chỉ Email</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="confirm-password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
