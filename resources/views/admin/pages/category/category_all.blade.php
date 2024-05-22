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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Category</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Category <span
                            class="ms-2 badge bg-danger">{{ count($categorys) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <!--begin::Primary button-->
                <a href="{{ route('all.category') }}" class="btn btn-sm btn-light-primary">Category</a>
                <a href="{{ route('all.subcategory') }}" class="btn btn-sm btn-light-info">Sub Category</a>
                <a href="{{ route('all.child') }}" class="btn btn-sm btn-light-dark">Child Category</a>
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
        <div id="kt_content_container" class="container">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">


                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <!--begin::Add product-->
                        <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                            Category</a>
                        <!--end::Add product-->

                    </div>
                    <!--end::Card toolbar-->

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->

                    <table id="kt_datatable_example_5" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorys as $key => $category)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/category/' . $category->category_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        @if ($category->status == 1)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($category->status == 1)
                                            <a href="{{ route('inactive.category', $category->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.category', $category->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        {{-- Edit Category Modal --}}
                                        <a href="" class="ms-1" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $category->id }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i>
                                        </a>

                                        <!-- EditModal -->
                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit
                                                            Category
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('update.category') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $category->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">

                                                                <div class="col-12 mb-3">
                                                                    <label for="" class="mb-2">Category
                                                                        Name</label>
                                                                    <input type="text" name="category_name"
                                                                        placeholder="Category Name"
                                                                        value="{{ $category->category_name }}"
                                                                        autocomplete="off"
                                                                        class="form-control form-control-sm @error('category_name') is-invalid @enderror">

                                                                    @error('category_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="" class="mb-2">Description</label>
                                                                    <textarea name="description" placeholder="Category Name" autocomplete="off" class="form-control form-control-sm"
                                                                        cols="3" rows="3">{{ $category->description }}</textarea>
                                                                </div>

                                                                <div class="col-6">
                                                                    <label for="" class="mb-2">Image</label>

                                                                    <input type="file" name="icon"
                                                                        class="form-control form-control-sm @error('icon') is-invalid @enderror">

                                                                    @error('icon')
                                                                        <div class="text-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/category/' . $category->icon) }}"
                                                                        class="mt-3" style="width: 73px;"
                                                                        alt="">
                                                                </div>

                                                                <div class="col-6">
                                                                    <label for="" class="mb-2">Banner
                                                                        Image</label>

                                                                    <input type="file" name="category_image"
                                                                        class="imageSrc form-control form-control-sm @error('category_image') is-invalid @enderror">

                                                                    @error('category_image')
                                                                        <div class="text-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/category/' . $category->category_image) }}"
                                                                        class="mt-3 showImageSrc" style="width: 73px;"
                                                                        alt="">
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Save
                                                                changes</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- Edit Category Modal --}}

                                        <a href="{{ route('delete.category', $category->id) }}" class="ms-1"
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


    <!-- AddModal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Category Name</label>
                                <input type="text" name="category_name" placeholder="Category Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('category_name') is-invalid @enderror">

                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" placeholder="Description" autocomplete="off" class="form-control form-control-sm"
                                    cols="3" rows="3"></textarea>
                            </div>

                            <div class="col-6">
                                <label for="" class="mb-2">Icon Iamge</label>
                                <input type="file" autocomplete="off" name="icon"
                                    class="form-control form-control-sm imageIcon @error('icon') is-invalid @enderror">

                                @error('icon')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img src="{{ url('upload/no_image.jpg') }}" class="showImageIcon mt-2"
                                    style="width:73px" alt="" class="mt-3">
                            </div>

                            <div class="col-6">
                                <label for="" class="mb-2">Cateagory Image</label>
                                <input type="file" autocomplete="off" name="category_image"
                                    class="form-control form-control-sm image @error('category_image') is-invalid @enderror">

                                @error('category_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" alt=""
                                    class="mt-2 showImage">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    {{-- Image Show --}}
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.imageIcon').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImageIcon').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


    {{-- DataTable  --}}
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
