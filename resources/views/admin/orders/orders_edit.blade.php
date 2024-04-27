@extends('admin.app')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sipariş güncelleme</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="{{ route('update.order') }}"
                                class="form-valide-with-icon needs-validation">
                                @csrf

                                <input type="hidden" name="id" value="{{ $order->order_details_id }}">

                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Sipariş detay id
                                    </label>
                                    <div class="input-group">
                                        <input name="order_id" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="{{$order->order_id}}" required />
                                    </div>
                                    @error('order_detail_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />

                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Kullanıcı Adı
                                    </label>
                                    <div class="input-group">
                                        <input name="platform_username" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="{{$order->platform_username}}" required />
                                    </div>
                                    @error('platform_username')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />

                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Ürün id
                                    </label>
                                    <div class="input-group">
                                        <input name="product_id" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="{{$order->product_id}}" required />
                                    </div>
                                    @error('product_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />

                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        miktar
                                    </label>
                                    <div class="input-group">
                                        <input name="quantity" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="{{$order->quantity}}" required />
                                    </div>
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />
                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Adı Soyadı
                                    </label>
                                    <div class="input-group">
                                        <input name="a_name" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="" required />
                                    </div>
                                    @error('a_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />
                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Email
                                    </label>
                                    <div class="input-group">
                                        <input name="a_email" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="" required/>
                                    </div>
                                    @error('a_email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />
                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Telefon No
                                    </label>
                                    <div class="input-group">
                                        <input name="a_phone_number" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="" required/>
                                    </div>
                                    @error('a_phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />
                                <div class="mb-4" style="display :flex">
                                    <label class="form-control text-label btn btn-primary form-label center text-4xl"
                                        style="width: 150px ;padding:5px ; font-size:14px; height:40px ; border-radius:8px"
                                        for="validationCustomUsername">
                                        Havale Kodu 
                                    </label>
                                    <div class="input-group">
                                        <input name="a_phone_number" type="text" class="form-control"
                                            style="margin-left: 30px" id="validationCustomUsername"
                                            value="a_code"/>
                                    </div>
                                    @error('a_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <hr />
                                

                                <button type="submit" class="mt-5 btn me-2 btn-primary">
                                    Sipariş Güncelle
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