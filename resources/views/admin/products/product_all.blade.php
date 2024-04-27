@extends('admin.app')
@section('admin')
    <link href="{{ asset('backend/vendor') }}/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('backend/vendor') }}/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
    <link href="{{ asset('backend/css') }}/style.css" rel="stylesheet" />
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tüm Ürünler</h4>
                            <div class="right">
                                <a class="button" href="{{ route('add.product') }}"><i class="fa-solid fa-plus"></i> Ürün ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">SN</th>
                                            <th style="width: 5%">PCategory</th>
                                            <th style="width: 5%">üstPCategory</th>
                                            <th style="width: 5%">üstüstPCategory</th>
                                            <th>ürün başlık</th>
                                            <th>ürün açıklama1</th>
                                            <th>ürün açıklama2</th>
                                            <th>ürün açıklama3</th>
                                            <th>ürün açıklama4</th>
                                            <th>ürün açıklama5</th>
                                            <th>ürün açıklama6</th>
                                            <th>ürün açıklama7</th>
                                            <th>ürün açıklama8</th>
                                            <th>ürün fiyat</th>
                                            <th>İşlem</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach ($product as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item['product_category']['product_category_name']}}</td>
                                                <td>{{ $item['product_category']->parentCategories->product_category_name }}</td>
                                                <td>{{ $item['product_category']->parentCategories->parentCategories->product_category_name ?? '' }}</td>
                                                <td>{{ $item->product_title }}</td>
                                                <td>{{ $item->product_desc1 }}</td>
                                                <td>{{ $item->product_desc2 }}</td>
                                                <td>{{ $item->product_desc3 }}</td>
                                                <td>{{ $item->product_desc4 }}</td>
                                                <td>{{ $item->product_desc5 }}</td>
                                                <td>{{ $item->product_desc6 }}</td>
                                                <td>{{ $item->product_desc7 }}</td>
                                                <td>{{ $item->product_desc8 }}</td>
                                                <td>{{ $item->product_price }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.product', $item->id) }}"
                                                            class="btn btn-primary shadow btn-xl  me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{ route('delete.product', $item->id) }}"
                                                            class="btn btn-danger shadow btn-xl " id="delete"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
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

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('backend/vendor') }}/global/global.min.js"></script>
    <script src="{{ asset('backend/vendor') }}/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ asset('backend/vendor') }}/apexchart/apexchart.js"></script>

    <script src="{{ asset('backend/vendor') }}/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/js') }}/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('backend/vendor') }}/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('backend/js') }}/custom.min.js"></script>
    <script src="{{ asset('backend/js') }}/dlabnav-init.js"></script>
    <script src="{{ asset('backend/js') }}/demo.js"></script>
    <script src="{{ asset('backend/js') }}/styleSwitcher.js"></script>
@endsection
