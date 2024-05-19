@extends('admin.admin_dashboard')
@section('admin')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Account Overview
                </h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Account</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Overview</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>

    </div>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">


            <!--begin::Navbar-->
            @include('admin.pages.profile.top_admin_profile')
            <!--end::Navbar-->


            <div class="card">
                <div class="card-body">

                    <form action="{{ route('update.admin.password') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-6 ">
                                <label for="">Old Password</label>
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">

                                @error('old_password')
                                            <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-6">
                                <label for="">New Password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">

                                @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 mt-2">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="new_password_confirmation">
                            </div>
                            <div class="text-muted mt-4">*Use 8 or more characters with a mix of letters,
                                numbers
                                &amp; symbols*</div>
                            <!--end::Hint-->

                            <div class="col-12">
                                <!--begin::Actions-->
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <span class="indicator-label">Update Password</span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
