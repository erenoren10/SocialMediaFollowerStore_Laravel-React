@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                            <h4 class="card-title">Ürün ekleme Formu</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('store.product') }}" enctype="multipart/form-data"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf


                                    <div id="product_category_section" class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px">
                                            Kategori seç
                                        </label>
                                        <div class="input-group">
                                            <div class="card" style="width:100%; margin-left: 20px">
                                                <select id="product_category_id"
                                                    class="default-select form-control wide mb-3" >
                                                    @foreach ($categories as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->product_category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />

                                    <div id="sub_category_section" class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px">
                                            alt Kategori seç
                                        </label>
                                        <div class="input-group">
                                            <div class="card" style="width:100%; margin-left: 20px">
                                                <select name="product_category_id" id="sub_category"
                                                    class="nice-select form-control wide mb-3" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    
                                    <div id="sub_category_alt_section" class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px">
                                            alt Kategori seç
                                        </label>
                                        <div class="input-group">
                                            <div class="card" style="width:100%; margin-left: 20px">
                                                <select name="product_category_id" id="sub_category_alt"
                                                    class="nice-select form-control wide mb-3" >
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />



                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            ürün başlığı
                                        </label>
                                        <div class="input-group">
                                            <input name="product_title" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" required />
                                        </div>
                                        @error('product_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 1
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc1" type="text" class="form-control"></textarea>
                                            @error('product_desc1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 2
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc2" type="text" class="form-control"></textarea>
                                            @error('product_desc2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 3
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc3" type="text" class="form-control"></textarea>
                                            @error('product_desc3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 4
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc4" type="text" class="form-control"></textarea>
                                            @error('product_desc4')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 5
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc5" type="text" class="form-control"></textarea>
                                            @error('product_desc5')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 6
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea  name="product_desc6" type="text" class="form-control"></textarea>
                                            @error('product_desc6')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 7
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc7" type="text" class="form-control"></textarea>
                                            @error('product_desc7')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ;margin-top:15px; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Ürün Açıklaması 8
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <textarea name="product_desc8" type="text" class="form-control"></textarea>
                                            @error('product_desc8')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display: flex;">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px; padding: 5px;margin-top:15px; font-size: 14px; height: 40px; border-radius: 8px"
                                            for="validationCustomUsername">
                                            Ürün fiyatı
                                        </label>
                                        <div class="input-group card-body custom-ekeditor">
                                            <input name="product_price" type="number" step="0.01" class="form-control">
                                            @error('product_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Ürünü Ekle
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Üst kategori seçildiğinde tetiklenecek fonksiyon
            document.getElementById('product_category_section').addEventListener('click', function () {
            var categoryId = document.getElementById('product_category_id').value; // Seçilen üst kategori ID'si // Seçilen üst kategori ID'si
           
                // Ajax isteği gönderme
                axios.get('/get-subcategories/' + categoryId)
                    .then(function (response) {
                        var subCategories = response.data.subCategories;

                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var subCategorySelect = document.getElementById('sub_category');
                        subCategorySelect.innerHTML = '<option value="">-- Seçiniz --</option>';    
                        console.log(subCategories);            
                        subCategories.forEach(function (subCat) {
                            subCategorySelect.innerHTML += '<option value="' + subCat.id + '">' + subCat.product_category_name + '</option>';
                        });

                        // Alt kategorileri görünür yapma
                        document.getElementById('sub_category').style.display = 'block';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
            document.getElementById('sub_category_section').addEventListener('click', function () {
            var categoryId = document.getElementById('sub_category').value; // Seçilen üst kategori ID'si // Seçilen üst kategori ID'si
        
                // Ajax isteği gönderme
                axios.get('/get-subcategoriesalt/' + categoryId)
                    .then(function (response) {
                        var subCategories = response.data.subCategories;

                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var subCategorySelect = document.getElementById('sub_category_alt');
                        subCategorySelect.innerHTML = '<option value="">-- Seçiniz --</option>';    
                        console.log(subCategories);           
                        subCategories.forEach(function (subCat) {
                            subCategorySelect.innerHTML += '<option value="' + subCat.id + '">' + subCat.product_category_name + '</option>';
                        });

                        // Alt kategorileri görünür yapma
                        document.getElementById('sub_category').style.display = 'block';
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            });
        });
    </script>
    
@endsection
