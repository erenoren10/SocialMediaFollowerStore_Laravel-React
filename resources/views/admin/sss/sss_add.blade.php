@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">SSS ekleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" id="myForm" action="{{ route('store.sss') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            SSS Soru
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="sss_questions" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control  text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            SSS Cevap
                                        </label>
                                        <div class="form-group input-group">
                                            <input name="sss_answers" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername"  />
                                        </div>
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        SSS ekle
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
                sss_questions: {
                    required: true,
                },
                sss_answers: {
                    required: true,
                },
            },
            messages: {
                sss_questions: {
                    required: "Please enter your sss questions",
                },
                sss_answers: {
                    required: "Please enter your sss answers",
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
