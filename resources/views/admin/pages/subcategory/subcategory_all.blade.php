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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">SubCategory</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total SubCategory <span
                            class="ms-2 badge bg-danger">{{ count($subcategorys) }}</span></li>
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
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">


                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                        <!--begin::Add product-->
                        <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                            SubCategory</a>
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
                                <th>SubCategory Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategorys as $key => $subcategory)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/subcategory/' . $subcategory->subcategory_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $subcategory->category->category_name }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>
                                        @if ($subcategory->status == 1)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($subcategory->status == 1)
                                            <a href="{{ route('inactive.subcategory',$subcategory->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.subcategory',$subcategory->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        {{-- Edit Category Modal --}}
                                        <a href="" class="ms-1" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $subcategory->id }}"
                                            class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i>
                                        </a>

                                        <!-- EditModal -->

                                        <div class="modal fade" id="editModal{{ $subcategory->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit
                                                            SubCategory
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <form action="{{ route('updata.subcategory') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="id"
                                                            value="{{ $subcategory->id }}">

                                                        <div class="modal-body">

                                                            <div class="row">


                                                                <div class="col-6 mb-3">
                                                                    <label for="" class="mb-2">Category
                                                                        Name</label>

                                                                    <select name="category_id" autocomplete="off"
                                                                        class="form-select form-select-sm" id="">
                                                                        <option value="">Choose Category</option>

                                                                        @foreach ($categorys as $category)
                                                                            <option
                                                                                value="{{ $category->id }}"{{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                                                                {{ $category->category_name }}</option>
                                                                        @endforeach

                                                                    </select>


                                                                    @error('category_id')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror

                                                                </div>


                                                                <div class="col-6 mb-3">
                                                                    <label for="" class="mb-2">SubCategory
                                                                        Name</label>
                                                                    <input type="text" name="subcategory_name"
                                                                        placeholder="SubCategory Name"
                                                                        value="{{ $subcategory->subcategory_name }}"
                                                                        autocomplete="off"
                                                                        class="form-control form-control-sm @error('subcategory_name') is-invalid @enderror">

                                                                    @error('subcategory_name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>

                                                                <div class="col-12 mb-3">
                                                                    <label for="" class="mb-2">Description</label>
                                                                    <textarea name="description" placeholder="Write Some Subcategory" autocomplete="off"
                                                                        class="form-control form-control-sm" cols="3" rows="3">{{ $subcategory->description }}</textarea>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="" class="mb-2">Image</label>
                                                                    <input type="file" name="subcategory_image"
                                                                        class="imageSrc form-control form-control-sm @error('subcategory_image') is-invalid @enderror">

                                                                    @error('subcategory_image')
                                                                        <div class="text-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror

                                                                    <img src="{{ asset('storage/subcategory/' . $subcategory->subcategory_image) }}"
                                                                        class="mt-3 showImageSrc"
                                                                        style="width: 73px;height:73px;" alt="">
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Update
                                                                Subcategory
                                                            </button>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>

                                        {{-- Edit Category Modal --}}

                                        <a href="{{ route('delete.subcategory', $subcategory->id) }}" class="ms-1"
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


    <!--end::Content-->

    <!-- AddModal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add SubCategory</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.subcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-6 mb-3">
                                <label for="" class="mb-2">Category Name</label>

                                <select name="category_id" autocomplete="off" class="form-select form-select-sm"
                                    id="">
                                    <option disabled selected>Choose Category</option>

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>

                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>


                            <div class="col-6 mb-3">
                                <label for="" class="mb-2">SubCategory Name</label>
                                <input type="text" name="subcategory_name" placeholder="SubCategory Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('subcategory_name') is-invalid @enderror">

                                @error('subcategory_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" placeholder="Description" autocomplete="off" class="form-control form-control-sm"
                                    cols="3" rows="3"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" name="subcategory_image"
                                    class="form-control imageSrc form-control-sm  @error('subcategory_image') is-invalid @enderror">

                                @error('subcategory_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img src="{{ asset('upload/no_image.jpg') }}" style="width: 73px;"
                                    class="showImageSrc mt-3" alt="">
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
            $('.imageSrc').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.showImageSrc').attr('src', e.target.result);
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
