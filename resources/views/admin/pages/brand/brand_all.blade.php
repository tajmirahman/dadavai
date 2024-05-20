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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Brand</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Brand <span
                            class="ms-2 badge bg-danger">{{ count($brands) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Brand</a>

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Post-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $key => $brand)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/brand/' . $brand->brand_image) }}" style="width: 40px;"
                                            alt="">
                                    </td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        @if ($brand->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($brand->status == 1)
                                            <a href="{{ route('inactive.brand', $brand->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.brand', $brand->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $brand->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Brand</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.brand') }}" method="POST"
                                                        enctype="multipart/form-data">

                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $brand->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-12">

                                                                    <div class="form-group mb-3">
                                                                        <label for="" class="mb-2">Brand
                                                                            Name</label>
                                                                        <input type="text" name="brand_name"
                                                                            class="form-control form-control-sm @error('brand_name') is-invalid @enderror"
                                                                            placeholder="Brand Name"
                                                                            value="{{ $brand->brand_name }}"
                                                                            autocomplete="off">
                                                                        @error('brand_name')
                                                                            <span class="text-danger"> {{ $message }}
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for=""
                                                                            class="mb-2">Description</label>
                                                                        <textarea class="form-control form-control-sm" placeholder="Brand Description" name="description">{{ $brand->description }}</textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group mb-3">

                                                                    <label for="" class="mb-2">Image</label>

                                                                    <input type="file" autocomplete="off"
                                                                        name="brand_image"
                                                                        class="image form-control form-control-sm mb-2 @error('brand_image') is-invalid @enderror">

                                                                    @error('brand_image')
                                                                        <div class="text-danger mb-2"> {{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/brand/' . $brand->brand_image) }}"
                                                                        style="width:73px" class="showImage" alt="">
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Brand</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('delete.brand', $brand->id) }}" class="ms-1" id="delete"
                                            title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Post-->

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Brand</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-12">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Brand Name</label>
                                    <input type="text" name="brand_name"
                                        class="form-control form-control-sm @error('brand_name') is-invalid @enderror"
                                        placeholder="Brand Name" autocomplete="off">
                                    @error('brand_name')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea class="form-control form-control-sm" placeholder="Write Something In Brand" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-3">

                                <label for="" class="mb-2">Image</label>

                                <input type="file" autocomplete="off" id="" name="brand_image"
                                    class="image form-control form-control-sm mb-2 @error('brand_image') is-invalid @enderror">

                                @error('brand_image')
                                    <div class="text-danger mb-2"> {{ $message }} </div>
                                @enderror

                                <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" class="showImage"
                                    alt="">
                            </div>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Add Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

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

    {{-- Data Table  --}}
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
