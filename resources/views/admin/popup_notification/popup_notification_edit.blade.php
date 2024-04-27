@extends('admin.app')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Popup Bildiri güncelleme</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('update.popupnotification') }}"
                                    class="form-valide-with-icon needs-validation">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $popupnotification->id }}">

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            popup bildiri başlık
                                        </label>
                                        <div class="input-group">
                                            <input name="popup_title" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$popupnotification->popup_title}}" required />
                                        </div>
                                        @error('popup_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            popup bildiri açıklama
                                        </label>
                                        <div class="input-group">
                                            <input name="popup_description" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$popupnotification->popup_description}}" required />
                                        </div>
                                        @error('popup_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            popup bildiri İndirim Oranı
                                        </label>
                                        <div class="input-group">
                                            <input name="discount_rate" type="number" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$popupnotification->discount_rate}}" required />
                                        </div>
                                        @error('popup_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            popup bildiri Kodu
                                        </label>
                                        <div class="input-group">
                                            <input name="code" type="text" class="form-control"
                                                style="margin-left: 30px" id="validationCustomUsername" value="{{$popupnotification->code}}" required />
                                        </div>
                                        @error('popup_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />
                                    <div class="mb-4" style="display :flex">
                                        <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                            style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                            for="validationCustomUsername">
                                            popup bildiri Geçerlilik Tarihi
                                        </label>
                                        <div class="input-group">
                                            <input name="validity_date" type="text" class="form-control"
                                                style="margin-left: 30px" id="datepicker" value="{{$popupnotification->validity_date ?? "YOK"}}" />
                                        </div>
                                        @error('popup_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr />

                                    <button type="submit" class="mt-5 btn me-2 btn-primary">
                                        Popup bildiri Güncelle
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
