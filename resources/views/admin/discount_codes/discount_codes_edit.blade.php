@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">İndirim Kodu güncelleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.discountcodes') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $discountcodes->id }}">
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim kategorisi
                                        </label>
                                        <div class="input-group">
                                            <input name="category" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$discountcodes->category}}" required />
                                        </div>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim kodu
                                        </label>
                                        <div class="input-group">
                                            <input name="discount_code" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$discountcodes->discount_code}}" required />
                                        </div>
                                        @error('discount_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            İndirim oranı
                                        </label>
                                        <div class="input-group">
                                            <input name="discount_rate" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$discountcodes->discount_rate}}" required />
                                        </div>
                                        @error('discount_rate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            Son indirim Tarihi
                                        </label>
                                        <div class="input-group">
                                            <input name="end_date" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$discountcodes->end_date}}" required />
                                        </div>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        İndirim kuponu Güncelle
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
