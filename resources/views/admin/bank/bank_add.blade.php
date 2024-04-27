@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Banka Bilgileri ekleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.bank') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Banka adı
                                        </label>
                                        <div class="input-group">
                                            <input name="bank_name" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" />
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Alıcı Adı
                                        </label>
                                        <div class="input-group">
                                            <input name="recipient_name" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"/>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Şube kodu
                                        </label>
                                        <div class="input-group">
                                            <input name="branch_code" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Hesap NO
                                        </label>
                                        <div class="input-group">
                                            <input name="account_number" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"/>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            IBAN
                                        </label>
                                        <div class="input-group">
                                            <input name="IBAN" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"/>
                                        </div>
                                    </div>
                                    <hr />


                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Banka Bilgileri ekle
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
@endsection


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                bank_name: {
                    required: true,
                },
                recipient_name: {
                    required: true,
                },
                branch_code: {
                    required: true,
                },
                account_number: {
                    required: true,
                },
                IBAN: {
                    required: true,
                },
            
            },
            messages: {
                bank_name: {
                    required: "Please enter your Bank name",
                },
                recipient_name: {
                    required: "Please enter your Recipient name",
                },
                branch_code: {
                    required: "Please enter your Branch code",
                },
                account_number: {
                    required: "Please enter your Account number",
                },
                IBAN: {
                    required: "Please enter your IBAN",
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