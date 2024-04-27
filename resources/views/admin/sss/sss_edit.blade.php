@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">SSS güncelleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.sss') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $sss->id }}">

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            SSS Soru
                                        </label>
                                        <div class="input-group">
                                            <input name="sss_questions" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$sss->sss_questions}}" required />
                                        </div>
                                        @error('sss_questions')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            SSS Cevap
                                        </label>
                                        <div class="input-group">
                                            <input name="sss_answers" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$sss->sss_answers}}" required />
                                        </div>
                                        @error('sss_answers')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />


                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        SSS Güncelle
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
