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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">ChildCategory</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total ChildCategory <span
                            class="ms-2 badge bg-danger">{{ count($childcategorys) }}</span></li>
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
                            ChildCategory</a>
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
                                {{-- <th>Category Name</th> --}}
                                <th>ChildCategory Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($childcategorys as $key => $childcategory)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/childcategory/' . $childcategory->childcategory_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    {{-- <td>{{ $subcategory['category']['category_name'] }}</td> --}}
                                    <td>{{ $childcategory->childcategory_name }}</td>
                                    <td>
                                        @if ($childcategory->status == 1)
                                            <span class="badge badge-light-success">Active</span>
                                        @else
                                            <span class="badge badge-light-danger">inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($childcategory->status == 1)
                                            <a href="{{ route('inactive.childcategory',$childcategory->id) }}"
                                                title="Inactive"><i class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.childcategory',$childcategory->id) }}"
                                                title="Active"><i class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        {{-- Edit Category Modal --}}

                                        <a href="" class="ms-1" title="Edit" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $childcategory->id }}"
                                            class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i>
                                        </a>

                                        <!-- EditModal -->

                                        <div class="modal fade" id="editModal{{ $childcategory->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                                <div class="modal-content">
                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit
                                                            ChildCategory
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

            <form action="{{ route('update.childcategory') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id"
                    value="{{ $childcategory->id }}">

                <div class="modal-body">

                    <div class="row">


                        <div class="col-4 mb-3">
                            <label for="" class="mb-2">Category
                                Name</label>

                            <select name="category_id" autocomplete="off"
                                class="form-select form-select-sm" id="">
                                <option selected disabled>Choose Category</option>

                                @foreach ($categorys as $category)
                                    <option
                                        value="{{ $category->id }}"{{ $childcategory->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach

                            </select>


                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="col-4 mb-3">
                            <label for="" class="mb-2">Subtegory
                                Name</label>

                            <select name="subcategory_id" autocomplete="off"
                                class="form-select form-select-sm" id="">
                                <option selected disabled>Choose SubCategory
                                </option>

                                @foreach ($subcategorys as $subcategory)
                                    <option
                                        value="{{ $subcategory->id }}"{{ $childcategory->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                                        {{ $subcategory->subcategory_name }}
                                    </option>
                                @endforeach

                            </select>


                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="col-4 mb-3">
                            <label for="" class="mb-2">ChildCategory
                                Name</label>
                            <input type="text" name="childcategory_name"
                                placeholder="ChildCategory Name"
                                value="{{ $childcategory->childcategory_name }}"
                                autocomplete="off"
                                class="form-control form-control-sm @error('childcategory_name') is-invalid @enderror">

                            @error('childcategory_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for=""
                                class="mb-2">Description</label>
                            <textarea name="description" placeholder="Write Some In ChildCategory" autocomplete="off" class="form-control form-control-sm" cols="3"
                                rows="3">{{ $childcategory->description }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="" class="mb-2">Image</label>
                            <input type="file"
                                name="childcategory_image"
                                class="form-control form-control-sm imageSrc @error('childcategory_image') is-invalid @enderror">

                            @error('childcategory_image')
                                <div class="text-danger">{{ $message }}
                                </div>
                            @enderror

                            <img src="{{ asset('storage/childcategory/' . $childcategory->childcategory_image) }}"
                                    class="mt-3 showImageSrc"
                                style="width: 73px;" alt="">
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

                                        <a href="{{ route('delete.childcategory',$childcategory->id) }}" class="ms-1"
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
                    <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Add ChildCategory</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.childcategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">Category Name</label>

                                <select name="category_id" autocomplete="off" class="form-select form-select-sm" id="">

                                    <option value="">Choose Category</option>

                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>


                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">SubCategory Name</label>

                                <select name="subcategory_id" autocomplete="off" class="form-select form-select-sm">


                                        <option ></option>


                                </select>

                                @error('subcategory_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-4 mb-3">
                                <label for="" class="mb-2">ChildCategory Name</label>
                                <input type="text" name="childcategory_name" placeholder="ChildCategory Name"
                                    autocomplete="off"
                                    class="form-control form-control-sm @error('childcategory_name') is-invalid @enderror">

                                @error('childcategory_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12 mb-3">
                                <label for="" class="mb-2">Description</label>
                                <textarea name="description" placeholder="Write Some In ChildCategory" autocomplete="off" class="form-control" cols="2"
                                    rows="2"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="" class="mb-2">Image</label>
                                <input type="file" name="childcategory_image"
                                    class="form-control form-control-sm imageSrc @error('childcategory_image') is-invalid @enderror">

                                @error('childcategory_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <img src="{{ asset('upload/no_image.jpg') }}" style="width: 73px; height:73px;" class="showImageSrc mt-3" alt="">
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


    {{-- SubCategory Load --}}

    <script type="text/javascript">

        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType:"json",
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });

</script>


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
