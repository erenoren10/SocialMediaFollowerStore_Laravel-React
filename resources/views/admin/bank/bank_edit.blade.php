@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Banka Bilgileri güncelleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.bank') }}"
                                @csrf
                                    class="form-valide-with-icon needs-validation">
                            

                                    <input type="hidden" name="id" value="{{ $bank->id }}">

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Banka adı
                                        </label>
                                        <div class="input-group">
                                            <input name="bank_name" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$bank->bank_name}}" required />
                                        </div>
                                        @error('bank_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$bank->recipient_name}}" required />
                                        </div>
                                        @error('recipient_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$bank->branch_code}}" required />
                                        </div>
                                        @error('branch_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$bank->account_number}}" required />
                                        </div>
                                        @error('account_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$bank->IBAN}}" required />
                                        </div>
                                        @error('IBAN')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Hesap Bİlgileri Güncelle
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
