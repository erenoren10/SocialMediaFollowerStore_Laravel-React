<!DOCTYPE html>
<html lang="tr">

<head>
	<title>FenomenPaket</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/icon/remixicon.css" rel="stylesheet">
	<link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <style>
        #searchInput {
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        #categorySelect {
            padding: 10px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
        }

        .col-md-4 {
            margin-bottom: 10px;
        }
        .card-body{
            display: flex;
        justify-content: center;
        }
        .product-description {
            border-bottom: 1px solid #ccc; /* Yatay çizgi */
            padding-bottom: 10px; /* Çizgi ile metin arasındaki boşluk */
            margin-bottom: 10px; /* Metin arasındaki boşluk */
        }
        .modal-title{
            font-size: 26px;
            font-weight: 500;           
        }

    </style>
</head>

<body>

<!-- header -->
@include('data.head')
<!-- header -->

<?php
use App\Models\Product;
if(!empty($_REQUEST["cat"])){
    $cat = $_REQUEST["cat"];

    if ($cat === "0") {
        $all_products = Product::orderBy('id','ASC')->latest()->get();
        
    }else{
        $all_products = Product::whereHas('product_category', function ($query) use ($cat) {
        $query->where('parent_id', $cat);
        })
        ->orderBy('id', 'ASC')
        ->latest()
        ->get();
    }
}else{$all_products = Product::orderBy('id','ASC')->latest()->get();}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-3">
                            <h4 class="card-title">Tüm Servisler</h4>
                            </div>
                            <div class="col-md-3">
                            <input id="searchInput" type="text" placeholder="Arama yap... " >
                            </div>
                            <div class="col-md-3">
                                <label>kategori seç:</label>
                                <select id="categorySelect">
                                    <option value="0">Seçiniz</option>
                                    <option value="0">Hepsi</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->product_category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">İD</th>
                                        <th> Platform </th>
                                        <th> Alt Kategori </th>
                                        <th> Başlık </th>
                                        <th> Süre </th>
                                        <th> Fiyat </th>
                                        <tr class="divider">
                                            <td colspan="7"><hr class="solid" style="border-top: 3px solid black;">
                                            </td>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($all_products as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item['product_category']->parentCategories->product_category_name }}</td>
                                            <td>{{ $item['product_category']['product_category_name'] ?? ' '}}</td>
                                            <td>{{ $item->product_title }}</td>
                                            <td>30 Dakika</td>
                                            <td>{{ $item->product_price }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#productModal{{ $item->id }}" class="btn btn-danger shadow btn-xl me-1" data-bs-toggle="modal"><i class="fas fa-pencil-alt"></i>
                                                        Görüntüle
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>   
                                        @if (!$loop->last) <!-- Son elemandan önce divider ekme -->
                                        <tr class="divider">
                                            <td colspan="7"><hr class="solid">
                                            </td>
                                        </tr>
                                        @endif
                                            <!-- Modal -->
                                            <div class="modal fade" id="productModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="productModalLabel{{ $item->id }}">{{ $item['product_category']->parentCategories->product_category_name }} - {{ $item->product_title }}</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true"><i class="ri-close-line"></i></span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Burada ürün bilgilerini gösterme içeriğini oluşturabilirsiniz -->
                                                            <ul style="margin-left:10px;">
                                                                <li>{{$item->product_desc1}}</li>
                                                                <li>{{$item->product_desc2}}</li>
                                                                <li>{{$item->product_desc3}}</li>
                                                                <li>{{$item->product_desc4}}</li>
                                                                <li>{{$item->product_desc5}}</li>
                                                                <li>{{$item->product_desc6}}</li>
                                                            </ul>
                                                            <b class="center">FİYAT: {{$item->product_price}} TL</b>
                                                        <!-- Diğer ürün bilgileri buraya eklenebilir -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="/mycart/add/{{ $item->id }}">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sipariş Oluştur</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- footer -->
@include('data.footer')
<!-- /footer -->

	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/swiper-bundle.min.js"></script>
	<script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // Sayfa yüklendiğinde seçilen kategoriyi ayarla
            var initialCategoryId = $('#categorySelect').val();
            
            $('#categorySelect').on('change', function () {
                var selectedCategoryId = $(this).val();
                
                $('table tbody tr').hide(); // Tüm satırları gizle
                
                if (selectedCategoryId === "") {
                    $('table tbody tr').show(); // Tüm satırları göster
                } else {
                    window.location.href = '?cat=' + selectedCategoryId; // Seçilen kategoriye ait satırları göster
                }
            });

            // Sayfa yüklendiğinde seçili kategoriyi tekrar seç
            $('#categorySelect').val(selectedCategoryId);
        });
    </script>
    <script>

    </script>
</body>

</html>