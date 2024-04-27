@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">İndirim kuponu ekleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.discountcodes') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim kategorisi
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="category" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim kuponu kod
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="discount_code" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim oranı
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="discount_rate" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Son indirim Tarihi
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="end_date" type="date" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        İndirim kuponu ekle
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
                category: {
                    required: true,
                },
                discount_code: {
                    required: true,
                },
                discount_rate: {
                    required: true,
                },
            },
            messages: {
                category: {
                    required: "Please enter your category",
                },
                discount_code: {
                    required: "Please enter your discount_code",
                },
                discount_rate: {
                    required: "Please enter your discount_rate",
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