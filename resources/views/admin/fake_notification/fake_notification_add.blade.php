@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">fake bildiri ekleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.fakenotification') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            fake bildiri başlık
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="fake_title" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                             fake açıklama
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="fake_description" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Fake bildiri ekle
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
                fake_title: {
                    required: true,
                },
                fake_description: {
                    required: true,
                },
            },
            messages: {
                fake_title: {
                    required: "Please enter your fake title",
                },
                fake_description: {
                    required: "Please enter your fake description",
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