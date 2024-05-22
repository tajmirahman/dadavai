@extends('admin.admin_dashboard')
@section('admin')

    {{-- jquery Cdn --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Product</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">Add Product<span
                        class="ms-2 badge bg-danger"></span></li>
                <!--end::Item-->

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">

            <!--begin::Primary button-->
            <a href="{{ route('all.product') }}" class="btn btn-light-primary btn-sm">
                Back</a>
            <!--end::Primary button-->

        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->

<div class="container">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
            <hr />

            <form id="myForm" action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label fw-bold">Product Name</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        name="product_name" placeholder="Enter product Name">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label fw-bold">Product Tag</label>
                                    <input type="text" class="form-control" id="inputProductTitle" name="tags"
                                        placeholder="Enter product Tag">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label fw-bold">Short
                                        Description</label>
                                    <textarea class="form-control" id="inputProductDescription" name="short_desc" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label fw-bold">Long
                                        Description</label>
                                    <textarea class="form-control" id="editor" name="overview" rows="3"></textarea>
                                </div>


                                <div class="mb-3">
                                    <label for="formFile" class="form-label fw-bold">Product Image</label>
                                    <input class="form-control" name="product_image" type="file" id="image">

                                    <img id="showImage" src="{{ asset('upload/no_image.jpg') }}"
                                        style="width: 73px; height:73px;" class="showImage mt-3" alt="">

                                </div>

                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label fw-bold">Multiple Image</label>
                                    <input id="image" class="form-control" name="multi_image[]" type="file"
                                        multiple="">

                                    <img id="showImage" src="{{ asset('upload/no_image.jpg') }}"
                                        style="width: 73px; height:73px;" class="showImage mt-3" alt="">

                                </div>
                            </div>
                        </div>



                        <div class="col-lg-4">
                            <div class="border border-3 p-4 rounded">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputPrice" class="form-label fw-bold">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" id="inputPrice"
                                            placeholder="00.00" required >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">Discount
                                            Price</label>
                                        <input type="text" class="form-control" name="discount_price"
                                            id="inputCompareatprice" placeholder="00.00">

                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">Product
                                            Code</label>
                                        <input type="text" class="form-control" name="sku_code"
                                            id="inputCompareatprice">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">
                                            Quantity</label>
                                        <input type="text" class="form-control" name="qty"
                                            id="inputCompareatprice">
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label fw-bold">Stock Status</label>
                                        <select class="form-select" name="stock" id="inputProductType">
                                            <option></option>
                                            <option class="form-select" value="available">
                                                Available
                                            </option>
                                            <option class="form-select" value="limited">
                                                Limited</option>
                                            <option class="form-select" value="unlimited">
                                                UnLimited</option>
                                            <option class="form-select" value="stock_out">
                                                Out of
                                                Stock</option>
                                        </select>

                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label fw-bold">Brand Name</label>
                                        <select class="form-select" name="brand_id" id="inputVendor">
                                            <option disabled>Select Brand</option>

                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                </option>
                                                @endforeach


                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label fw-bold">Category</label>
                                        <select class="form-select" name="category_id" id="inputVendor" required>
                                            <option ></option>
                                                @foreach ($Categorys as $Category)
                                                <option value="{{ $Category->id }}">{{ $Category->category_name }}
                                                </option>
                                                @endforeach


                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label fw-bold">Sub Category</label>
                                        <select class="form-select" name="subcategory_id">
                                            <option value="">Select Subcategory</option>

                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label fw-bold">Child Category</label>
                                        <select class="form-select" name="childcategory_id" >
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="row m-5">

                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="checkbox" name="featured" value="1"
                                                    id="flexCheckChecked" >
                                                <label class="form-check-label fw-bold" for="flexCheckChecked">Best Sell</label>
                                            </div>
                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="checkbox" name="special_offer" value="1"
                                                    id="flexCheckChecked" >
                                                <label class="form-check-label fw-bold"
                                                    for="flexCheckChecked">Feature</label>
                                            </div>


                                    </div>


                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Save Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </form>
        </div>
    </div>
</div>

{{-- //subcategory ajax --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="childcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });


    // Show State Data

    $(document).ready(function() {
        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                //function subcategory() {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="childcategory_id"]').html('');
                        var d = $('select[name="childcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="childcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .childcategory_name + '</option>');
                        });
                    },

                });
                //}
            } else {
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                },
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
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



{{-- Image Show  --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

{{-- CK Editor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
{{-- CK Editor --}}





@endsection
