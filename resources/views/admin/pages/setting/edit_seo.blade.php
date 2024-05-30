@extends('admin.admin_dashboard')
@section('admin')

<div class="container">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('seo.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="{{ $seo->id }}">

                        <div class="row">
                            <div class="col-12">
                                <div class="mt-2">
                                    <label for="">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" autocomplete="off" value="{{ $seo->meta_title }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-2">
                                    <label for="">Meta Author</label>
                                    <input type="text" name="meta_author" class="form-control" autocomplete="off" value="{{ $seo->meta_author }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-2">
                                    <label for="">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control" autocomplete="off" value="{{ $seo->meta_keyword }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-2">
                                    <label for="">Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control" autocomplete="off" value="{{ $seo->meta_description }}">
                                </div>
                            </div>
                            <div class="float-end mt-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
