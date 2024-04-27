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
                            <h4 class="card-title">Popup Bildiriler</h4>
                            <div class="right">
                                <a class="button" href="{{ route('add.popupnotification') }}"><i class="fa-solid fa-plus"></i> Yeni ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th style="width: 30%">Popup Bildiri Başlık</th>
                                            <th style="width: 70%">Popup Bildiri açıklama</th>
                                            <th>Popup Bildiri İndirim Oranı</th>
                                            <th>Popup Bildiri Kodu</th>
                                            <th>Popup Bildiri Geçerlilik Tarihi</th>
                                            <th>İşlem</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popupnotification as $key=> $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->popup_title }}</td>
                                                <td>{{ $item->popup_description }}</td>
                                                <td>{{ $item->discount_rate }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->validity_date ?? "YOK"}}</td>




                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.popupnotification', $item->id) }}"
                                                            class="btn btn-primary shadow btn-xl  me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{ route('delete.popupnotification', $item->id) }}"
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
