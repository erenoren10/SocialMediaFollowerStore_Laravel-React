@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 5px;
            color: #ccc;
            font-weight: 700px;
        }
    </style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ürün düzenleme formu</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.product') }}" enctype="multipart/form-data"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_category_id" value="{{ $product->product_category_id }}">
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                             kategori
                                        </label>
                                        <div class="input-group">
                                            <div class="card" style="width:100%; margin-left: 20px">
                                                <input type="text" class="form-control" placeholder="{{$product->product_category_id}} / {{$product->product_category->product_category_name ?? ''}} / {{$product->product_category->parentCategories->product_category_name ?? ''}} / {{$product->product_category->parentCategories->parentCategories->product_category_name ?? ''}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Product Title
                                        </label>
                                        <div class="input-group">
                                            <input name="product_title" type="text" class="form-control"
                                                style="margin-left: 30px" value="{{$product->product_title}}" id="validationCustomUsername" required />
                                        </div>
                                        @error('product_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 1 
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc1" type="text" class="form-control"> {{$product->product_desc1}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 2
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc2" type="text" class="form-control"> {{$product->product_desc2}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 3
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc3" type="text" class="form-control"> {{$product->product_desc3}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 4
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc4" type="text" class="form-control"> {{$product->product_desc4}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 5
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc5" type="text" class="form-control"> {{$product->product_desc5}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 6
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc6" type="text" class="form-control"> {{$product->product_desc6}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 7
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc7" type="text" class="form-control"> {{$product->product_desc7}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 8
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc8" type="text" class="form-control"> {{$product->product_desc8}}</textarea>
                                            @error('product_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display: flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px; padding: 5px; font-size: 14px; height: 40px; border-radius: 8px"
                                            for="validationCustomUsername">
                                            Ürün fiyatı
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <input name="product_price" type="number" step="0.01" class="form-control" value="{{$product->product_price}}">
                                            @error('product_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />



                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Ürünü Güncelle
                                    </button>
                                    <button class="mt-5 btn btn-light">
                                        iptal
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#ProfileImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
