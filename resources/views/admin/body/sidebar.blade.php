<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu" style="height:90%">
            <li><a class=" " href="{{ route('dashboard') }}" aria-expanded="false">
                <i class="fa-solid fa-play"></i></i>
                <span class="nav-text">Başlangıç</span>
                </a>
            </li>
            
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-chart-pie"></i>
                <span class="nav-text">Veriler</span>
            </a>
            <ul aria-expanded="false">
                <li><a href="{{ route('all.order') }}">Siparişler</a></li>

                <li><a href="{{ route('all.support') }}">Destek Mesajları</a></li>
                <li><a href="{{ route('contact.message') }}">İletişim mesajları</a></li>
            </ul>
            </a>
            </li>
            <hr>

            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-list"></i>
                <span class="nav-text">Hizmet Yönetimi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.product') }}">Ürünler</a></li>
                    <li><a href="{{ route('all.product.category') }}">Ürün Kategorileri</a></li>
                    <li><a href="{{ route('all.sss') }}">Sıkça Sorulan Sorular</a></li>
                    <li><a href="{{ route('all.happycustomer') }}">Mutlu Müşteriler</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-layer-group"></i>
                <span class="nav-text">Sistem Yönetimi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.discountcodes') }}">Kuponlar</a></li>
                    <li><a href="{{ route('about.multi.image') }}">Multi fotoğraf ekle</a></li>
                    <li><a href="{{ route('all.multi.image') }}">Bütün fotoğraflar</a></li>
                </ul>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="nav-text">İçerikler</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.blog') }}">Bloglar</a></li>
                    <li><a href="{{ route('all.blog.category') }}">blog Kategorileri </a></li>
                </ul>
                </a>
            </li>
            

            <hr>
            <li><a class="" href="{{ route('all.user') }}" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">Kullanıcılar</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span class="nav-text">Araçlar</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.fakenotification') }}">Fake Bildiriler</a></li>
                    <li><a href="{{ route('all.popupnotification') }}">Popup Bildiriler</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                <span class="nav-text">Banka Bilgileri (Havale/eft)</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('all.bank') }}">Banka Bilgileri</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
