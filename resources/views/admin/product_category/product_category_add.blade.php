@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Ürün Kategorisi Ekleme Formu</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.product.category') }}"
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
                                                    class="nice-select form-control wide mb-3" >
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

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Kategori İsmi
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="product_category_name" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" required />
                                        </div>
                                    </div>
                                    <hr />




                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Kategoriye Ekle
                                    </button>
                                    <button class="mt-5 btn btn-light">
                                        İptal
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
    });
</script>


<script type="text/javascript">
/* !!! REQUİRED YAPISI VARKEN BUNA GEREKE YOK İSTERSEN YORUM SATIRLARINI KALDIRIP EKTİF EDEBİLİRSİN !!!
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                product_category_name: {
                    required: true,
                },
                product_title: {
                    required: true,
                },
            },
            messages: {
                product_category_name: {
                    required: "Please enter your product category name",
                },
                product_title: {
                    required: "Please enter your product title",
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            hightlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        }); 
    });
    */
</script>

@endsection




