@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Slider</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Slider<span
                            class="ms-2 badge bg-danger">{{ count($sliders) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->
                <a href="" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Slider</a>
                <!--end::Primary button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="" class="container">
            <!--begin::Products-->
            <div class="card card-flush">

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">

                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Slider Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/slider/' . $slider->slider_image) }}" style="width: 50px;height:30px;"
                                            alt="">
                                    </td>
                                    <td>{{ $slider->slider_name }}</td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($slider->status == 1)
                                            <a href="{{ route('inactive.slider',$slider->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.slider',$slider->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        {{-- Edit Modal  --}}
                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $slider->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal  --}}
                                        <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Edit
                                                            Slider</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

            <form action="{{ route('update.slider') }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <input type="hidden" name="id" value="{{ $slider->id }}">
                {{-- <input type="hidden" name="old_image"
                    value="{{ $slider->slider_image }}"> --}}

                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">

                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Slider
                                    Name</label>
                                <input type="text"
                                    value="{{ $slider->slider_name }}"
                                    name="slider_name"
                                    class="form-control form-control-sm "
                                    placeholder="Banner Name" autocomplete="off">

                            </div>

                            <div class="form-group mb-3">
                                <label for=""
                                    class="mb-2">Description</label>
                                <textarea name="description" rows="3" cols="3" class="form-control form-control-sm">{!! $slider->description !!}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" autocomplete="off"
                                    name="slider_image"
                                    class="image mb-2 form-control form-control-sm">

                                <img src="{{ asset($slider->slider_image) }}"
                                    style="width:73px;" class="showImage"
                                    alt="" class="mt-3">
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update
                        Slider</button>
                </div>
            </form>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Delete --}}
                                        <a href="{{ route('delete.slider',$slider->id) }}" class="ms-1"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    {{-- Add Modal --}}

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Slider</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="myForm" action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Slider Name</label>
                                    <input type="text" name="slider_name"
                                        class="form-control form-control-sm "
                                        placeholder="Slider Name" autocomplete="off">

                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" cols="2" placeholder="Write Something In Banner" rows="2"
                                        class="form-control form-control-sm"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Image</label>
                                    <input type="file" autocomplete="off" name="slider_image"
                                        class="image form-control form-control-sm mb-2">



                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" class="showImage"
                                        alt="">
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- Image Show  --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('.image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    {{-- validation --}}
    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    slider_name: {
                        required : true,
                    },

                },
                messages :{
                    slider_name: {
                        required : 'Please Enter Slider Name',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

    <!-- Button trigger modal -->
    <script>
        $("#kt_datatable_example_5").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom": "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    </script>
@endsection
