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
                            <h4 class="card-title">İndirim kuponları</h4>
                            <div class="right">
                                <a class="button" href="{{ route('add.discountcodes') }}"><i class="fa-solid fa-plus"></i> Kupon Ekle</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th style="width: 30%">İndirim kategorisi </th>
                                            <th style="width: 30%">İndirim Kodu </th>
                                            <th style="width: 40%">İndirim oranı</th>
                                            <th style="width: 40%">Son İndirim tarihi</th>
                                            <th>İşlem</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($discountcodes as $key=> $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->discount_code }}</td>
                                                <td>{{ $item->discount_rate }}</td>
                                                <td>{{ $item->end_date }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('edit.discountcodes', $item->id) }}"
                                                            class="btn btn-primary shadow btn-xl  me-1"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                        <a href="{{ route('delete.discountcodes', $item->id) }}"
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
