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
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Offer</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Total Offer <span
                            class="ms-2 badge bg-danger">{{ count($offers) }}</span></li>
                    <!--end::Item-->

                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center gap-2 gap-lg-3">

                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-light-primary btn-sm">Add
                    Offer</a>

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
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Dis Price</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $key => $offer)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('storage/offer_image/' . $offer->offer_image) }}"
                                            style="width: 40px;" alt="">
                                    </td>
                                    <td>{{ $offer->name }}</td>
                                    <td>{{ $offer->category_name }}</td>
                                    <td>{{ $offer->price }}</td>
                                    <td>{{ $offer->discount_price }}</td>
                                    <td>{{ $offer->start_date }}</td>
                                    <td>{{ $offer->end_date }}</td>
                                    <td>
                                        @if ($offer->status == 1)
                                            <span class="badge badge-light-success">Is_active</span>
                                        @else
                                            <span class="badge badge-light-danger">Is_inactive</span>
                                        @endif
                                    </td>
                                    <td>

                                        @if ($offer->status == 1)
                                            <a href="{{ route('inactive.offer',$offer->id) }}" title="Inactive"><i
                                                    class="bi bi-hand-thumbs-down text-danger fs-3"></i></a>
                                        @else
                                            <a href="{{ route('active.offer',$offer->id) }}" title="Active"><i
                                                    class="bi bi-hand-thumbs-up text-success fs-3"></i></a>
                                        @endif

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $offer->id }}" class="ms-1" title="Edit"><i
                                                class="bi bi-pencil-square fs-3 text-primary"></i></a>

                                        {{-- Edit Modal --}}

                                        <div class="modal fade" id="editModal{{ $offer->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">

                                                    <div class="modal-header" style="background: #6196A6;height: 50px;">
                                                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">
                                                            Update Offer</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

    <form action="{{ route('update.offer') }}" method="POST"
        id="myForm1" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $offer->id }}">

        <div class="modal-body">

            <div class="row">

                <div class="col-6 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Name</label>
                        <input type="text" name="name"
                            class="form-control form-control-sm form-control-solid"
                            placeholder="Offer Name"
                            value="{{ $offer->name }}" autocomplete="off">
                    </div>

                </div>

                <div class="col-6 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Offer Category
                            Name</label>
                        <select name="offer_category_id"
                            class="form-control form-control-sm form-control-solid"
                            id="">

                            <option selected disabled>Choose Category Name
                            </option>

                            @foreach ($offercats as $offercat)
                                <option value="{{ $offercat->id }}"
                                    {{ $offer->offer_category_id == $offercat->id ? 'selected' : '' }}>
                                    {{ $offercat->offer_category_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                </div>

                <div class="col-3 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Price</label>
                        <input type="number" name="price"
                            class="form-control form-control-sm form-control-solid"
                            placeholder="Price" value="{{ $offer->price }}"
                            autocomplete="off">
                    </div>

                </div>

                <div class="col-3 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Discount
                            Price</label>
                        <input type="number" name="discount_price"
                            class="form-control form-control-sm form-control-solid"
                            placeholder="Discount Price"
                            value="{{ $offer->discount_price }}"
                            autocomplete="off">
                    </div>

                </div>

                <div class="col-3 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">Start
                            Date</label>
                        <input type="date" name="start_date"
                            class="form-control form-control-sm form-control-solid"
                            autocomplete="off"
                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                            value="{{ $offer->start_date }}">
                    </div>

                </div>

                <div class="col-3 mb-3">

                    <div class="form-group mb-3">
                        <label for="" class="mb-2">End
                            Date</label>
                        <input type="date" name="end_date"
                            class="form-control form-control-sm form-control-solid"
                            autocomplete="off"
                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                            value="{{ $offer->end_date }}">
                    </div>

                </div>

                <div class="col-7">
                    <div class="form-group mb-3">
                        <label for=""
                            class="mb-2">Description</label>
                        <textarea name="description" class="form-control form-control-sm" id="" cols="1" rows="1">{!! $offer->description !!}</textarea>
                    </div>
                </div>

                <div class="col-5">
                    <div class="form-group mb-3">

                        <label for="" class="mb-2">Image</label>

                        <input type="file" autocomplete="off"
                            id="" name="offer_image"
                            class="form-control form-control-sm border-1 mb-2 image">

                        <img src="{{ asset('storage/offer_image/' . $offer->offer_image) }}"
                            style="width:73px" class="showImage"
                            alt="">
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-sm">Update
                Offer</button>
        </div>
    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('delete.offer',$offer->id) }}" class="ms-1"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background: #6196A6;height: 50px;">
                    <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Offer</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="myForm" action="{{ route('store.offer') }}" method="POST" id="myForm" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-6 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Name</label>
                                    <input type="text" name="name"
                                        class="form-control form-control-sm form-control-solid" placeholder="Offer Name"
                                        value="{{ old('name') }}" autocomplete="off">
                                </div>

                            </div>

                            <div class="col-6 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Offer Category Name</label>
                                    <select name="offer_category_id"
                                        class="form-control form-control-sm form-control-solid" id="">

                                        <option selected disabled>Choose Category Name</option>

                                        @foreach ($offercats as $offercat)
                                            <option value="{{ $offercat->id }}">{{ $offercat->offer_category_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="col-3 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Price</label>
                                    <input type="number" name="price"
                                        class="form-control form-control-sm form-control-solid" placeholder="Price"
                                        value="{{ old('price') }}" autocomplete="off">
                                </div>

                            </div>

                            <div class="col-3 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Discount Price</label>
                                    <input type="number" name="discount_price"
                                        class="form-control form-control-sm form-control-solid"
                                        placeholder="Discount Price" value="{{ old('discount_price') }}"
                                        autocomplete="off">
                                </div>

                            </div>

                            <div class="col-3 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Start Date</label>
                                    <input type="date" name="start_date"
                                        class="form-control form-control-sm form-control-solid"
                                        value="{{ old('start_date') }}" autocomplete="off"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>

                            </div>

                            <div class="col-3 mb-3">

                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">End Date</label>
                                    <input type="date" name="end_date"
                                        class="form-control form-control-sm form-control-solid"
                                        value="{{ old('end_date') }}" autocomplete="off"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>

                            </div>

                            <div class="col-7">
                                <div class="form-group mb-3">
                                    <label for="" class="mb-2">Description</label>
                                    <textarea name="description" class="form-control form-control-sm" id="" cols="1" rows="1"></textarea>
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="form-group mb-3">

                                    <label for="" class="mb-2">Image</label>

                                    <input type="file" autocomplete="off" id="" name="offer_image"
                                        class="form-control form-control-sm border-1 form-control-solid mb-2 image">

                                    <img src="{{ url('upload/no_image.jpg') }}" style="width:73px" class="showImage"
                                        alt="">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Add Offer</button>
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

    {{-- validation --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    offer_category_id: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    discount_price: {
                        required: true,
                    },

                },
                messages: {
                    name: {
                        required: 'Please Enter Offer Name',
                    },
                    offer_category_id: {
                        required: 'Please Enter Offer category Name',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
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
