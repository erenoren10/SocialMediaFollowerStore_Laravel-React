@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Popup bildiri ekleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.popupnotification') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Popup Bildiri Başlık
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="popup_title" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Popup Bildiri açıklama
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="popup_description" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Popup Bildiri İndirim Oranı
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="discount_rate" type="number" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Popup Bildiri Kodu
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="code" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display: flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px; padding: 5px; font-size: 14px; height:55px; border-radius: 8px;"
                                            for="datePickerInput">
                                            Popup Bildiri Geçerlilik Tarihi
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="validity_date" type="date" class="form-control datepicker"
                                                style="margin-left: 30px;" id="datePickerInput"  />
                                        </div>
                                    </div>
                                    <hr/>

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Popup bildiri ekle
                                    </button>
                                    <button class="mt-5 btn btn-light" >
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
@endsection


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                popup_title: {
                    required: true,
                },
                popup_description: {
                    required: true,
                },
                discount_rate: {
                    required: true,
                },
                code: {
                    required: true,
                },
                validity_date: {
                    required: true,
                },
            },
            messages: {
                popup_title: {
                    required: "Please enter your popup title",
                },
                popup_description: {
                    required: "Please enter your popup description",
                },
                discount_rate: {
                    required: "Please enter your discount rate",
                },
                code: {
                    required: "Please enter your code",
                },
                validity_date: {
                    required: "Please enter your validity date",
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
        }});
    });
</script>




<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS and DatePicker -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
