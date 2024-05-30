@extends('admin.admin_dashboard')
@section('admin')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.setting') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $setting->id }}">

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Site
                                Name</label>

                            <input type="text" name="site_name" class="form-control form-control-sm "
                                placeholder="Site Name" value="{{ $setting->site_name }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Company
                                Name</label>

                            <input type="text" name="company_name" class="form-control form-control-sm "
                                placeholder="Company Name" value="{{ $setting->company_name }}" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Site
                                Slogan</label>

                            <input type="text" name="site_slogan" class="form-control form-control-sm "
                                placeholder="slogan name" value="{{ $setting->site_slogan }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Phone
                                One</label>

                            <input type="number" name="phone_one" class="form-control form-control-sm "
                                placeholder="phone number 1" value="{{ $setting->phone_one }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">

                            <div class="form-group mb-3">
                                <label for="" class="mb-2">Phone
                                    Two</label>

                                <input type="number" name="phone_two" class="form-control form-control-sm "
                                    placeholder="phone number 2" value="{{ $setting->phone_two }}" autocomplete="off">
                            </div>

                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Whatsapp
                                Number</label>

                            <input type="number" name="whatsapp_number" class="form-control form-control-sm "
                                placeholder="whatsapp number" value="{{ $setting->whatsapp_number }}"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Address</label>

                            <input type="text" name="address" class="form-control form-control-sm "
                                placeholder="Address" value="{{ $setting->address }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Language</label>

                            <input type="text" name="default_language" class="form-control form-control-sm "
                                placeholder="language" value="{{ $setting->default_language }}"
                                autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-3">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Contact Email</label>

                            <input type="email" name="contact_email" class="form-control form-control-sm "
                                placeholder="Contact Email" value="{{ $setting->contact_email }}"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Support Email</label>

                            <input type="email" name="support_email" class="form-control form-control-sm "
                                placeholder="Support email" value="{{ $setting->support_email }}"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Facebook Url</label>

                            <input type="text" name="facebook_url" class="form-control form-control-sm "
                                placeholder="facebook url" value="{{ $setting->facebook_url }}"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mb-3">
                            <label for="" class="mb-2">Youtube Url</label>

                            <input type="text" name="youtube_url" class="form-control form-control-sm "
                                placeholder="youtube url" value="{{ $setting->youtube_url }}"
                                autocomplete="off">
                        </div>
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col-4">
                        <label for="" class="mb-2">White Logo</label>

                                <input type="file" autocomplete="off" name="logo_white"
                                    class="image form-control form-control-sm mb-2">

                                <img src="{{ asset('upload/logo_white/' . $setting->logo_white) }}" style="width:73px"
                                    class="showImage" alt="">
                    </div>
                    <div class="col-4">
                        <label for="" class="mb-2">Black Logo</label>

                                <input type="file" autocomplete="off" name="logo_black"
                                    class="image form-control form-control-sm mb-2">

                                <img src="{{ asset('upload/logo_black/' . $setting->logo_black) }}" style="width:73px"
                                    class="showImage" alt="">
                    </div>
                    <div class="col-4">
                        <label for="" class="mb-2">Favcon</label>

                                <input type="file" autocomplete="off" name="favicon"
                                    class="image form-control form-control-sm mb-2">

                                <img src="{{ asset('upload/favicon/' . $setting->favicon) }}" style="width:73px"
                                    class="showImage" alt="">
                    </div>
                </div>
                <div class="float-end">
                    <button type="submit" class="btn btn-success">update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
