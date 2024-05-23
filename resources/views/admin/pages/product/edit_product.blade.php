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
                <li class="breadcrumb-item text-muted">Edit Product<span
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
            <h5 class="card-title">Edit New Product</h5>
            <hr />

            <form id="myForm" action="{{ route('update.product') }}" method="post" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $editProduct->id }}">


                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputProductTitle" class="form-label fw-bold">Product Name</label>
                                    <input type="text" class="form-control" id="inputProductTitle"
                                        name="product_name" placeholder="Enter product Name" value="{{ $editProduct->product_name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label fw-bold">Product Tag</label>
                                    <input type="text" class="form-control" id="inputProductTitle" name="tags"
                                        placeholder="Enter product Tag" value="{{ $editProduct->tags }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label fw-bold">Short
                                        Description</label>
                                    <textarea class="form-control" id="inputProductDescription" name="short_desc" rows="3">{!! $editProduct->tags !!}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="inputProductDescription" class="form-label fw-bold">Long
                                        Description</label>
                                    <textarea class="form-control" id="editor" name="overview" rows="3">{!! $editProduct->overview !!}</textarea>
                                </div>


                                <div class="mb-3">
                                    <label for="formFile" class="form-label fw-bold">Product Image</label>
                                    <input class="form-control" name="product_image" type="file" id="image">

                                    <img id="showImage" src="{{ asset('storage/product/' . $editProduct->product_image) }}"
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
                                            placeholder="00.00" required value="{{ $editProduct->selling_price }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">Discount
                                            Price</label>
                                        <input type="text" class="form-control" name="discount_price"
                                            id="inputCompareatprice" placeholder="00.00" value="{{ $editProduct->discount_price }}">

                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">Product
                                            Code</label>
                                        <input type="text" class="form-control" name="sku_code"
                                            id="inputCompareatprice" value="{{ $editProduct->sku_code }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCompareatprice" class="form-label fw-bold">
                                            Quantity</label>
                                        <input type="text" class="form-control" name="qty"
                                            id="inputCompareatprice" value="{{ $editProduct->qty }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="inputProductType" class="form-label fw-bold">Stock Status</label>
                                        <select class="form-select" name="stock" id="inputProductType">
                                            <option></option>
                                            <option class="form-select" value="available" {{ $editProduct->stock == 'available' ? 'selected' : '' }}>
                                                Available
                                            </option>
                                            <option class="form-select" value="limited" {{ $editProduct->stock == 'limited' ? 'selected' : '' }}>
                                                Limited</option>
                                            <option class="form-select" value="unlimited" {{ $editProduct->stock == 'unlimited' ? 'selected' : '' }}>
                                                UnLimited</option>
                                            <option class="form-select" value="stock_out" {{ $editProduct->stock == 'stock_out' ? 'selected' : '' }}>
                                                Out of
                                                Stock</option>
                                        </select>

                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label fw-bold">Brand Name</label>
                                        <select class="form-select" name="brand_id" id="inputVendor">
                                            <option disabled></option>

                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"{{ $editProduct->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->brand_name }}
                                                </option>
                                                @endforeach


                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputVendor" class="form-label fw-bold">Category</label>
                                        <select class="form-select" name="category_id" id="inputVendor" required>
                                            <option ></option>
                                                @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}"{{ $editProduct->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}
                                                </option>
                                                @endforeach


                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label fw-bold">Sub Category</label>
                                        <select class="form-select" name="subcategory_id">
                                            @foreach ($subcategorys as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $editProduct->subcategory_id == $subcat->id ? 'selected' : '' }}>{{ $subcat->subcategory_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCollection" class="form-label fw-bold">Child Category</label>
                                        <select class="form-select" name="childcategory_id" >
                                            @foreach ($childcategorys as $childcat)
                                            <option value="{{ $childcat->id }}" {{ $editProduct->childcategory_id == $childcat->id ? 'selected' : '' }}>{{ $childcat->childcategory_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row m-5">

                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="checkbox" name="bestsell" value="1"
                                                    id="flexCheckChecked" {{ $editProduct->bestsell == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold" for="flexCheckChecked">Best Sell</label>
                                            </div>
                                            <div class="col-6 form-check">
                                                <input class="form-check-input" type="checkbox" name="feature" value="1"
                                                    id="flexCheckChecked" {{ $editProduct->feature == 1 ? 'checked' : '' }}>
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

  {{-- Multi Image Part --}}

  <div class="row p-4">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">

                <h5 class="mb-3">Add Multi Image</h5>

                <form action="{{ route('add.new.multiimage') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="imageid" value="{{ $editProduct->id }}">

                    <div class="row">

                        <div class="col-8">
                            <input type="file" required autocomplete="off" class="form-sm" name="multi_img">
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-sm p-2">Submit</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Sl No</th>
                            <th scope="col">Image</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <form action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            @foreach ($multiImages as $key => $img)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('storage/product/multi_image/' . $img->multi_image) }}" style="width: 50px; height: 50p;;"
                                            alt=""></td>

                                    <td>
                                        <input type="file" class="btn-sm" name="multi_img[{{ $img->id }}]"
                                            autocomplete="off">
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">submit</button>

                                        <a href="{{ route('delete.multiimage',$img->id) }}" id="delete" title="delete"><i
                                                class="fa-solid fa-trash fs-3"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





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
