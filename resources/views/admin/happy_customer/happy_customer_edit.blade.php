@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Mutlu Müşteri Güncelleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.happycustomer') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $happycustomer->id }}">

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Mutlu Müşteri İsim
                                        </label>
                                        <div class="input-group">
                                            <input name="customer_name" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$happycustomer->customer_name}}" required />
                                        </div>
                                        @error('customer_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Mutlu Müşteri Meslek/Ünvan
                                        </label>
                                        <div class="input-group">
                                            <input name="customer_job" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$happycustomer->customer_job}}" required />
                                        </div>
                                        @error('customer_job')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:55px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Mutlu Müşteri Yorumu
                                        </label>
                                        <div class="input-group">
                                            <input name="customer_comments" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$happycustomer->customer_comments}}" required />
                                        </div>
                                        @error('customer_comments')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Mutlu Müşteri Güncelle
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
