<div class="quixnav">
    <div class="quixnav-scroll ps ps--active-y mm-active">
        <ul class="metismenu mm-show" id="menu">
        
        @if (Auth::user()->role == 'merchant')
            <br>
            <li><a href="{{ route('merchant.dashboard') }}" aria-expanded="false">
                    <i class="icon icon-home"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('merchant.menu') }}" aria-expanded="false">
                <i class="icon icon-home"></i><span class="nav-text">Menu</span>
            </a>
            </li>
            <li><a href="{{ route('merchant.orders') }}" aria-expanded="false">
                <i class="icon icon-home"></i><span class="nav-text">Order</span>
            </a>
            </li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-settings"></i><span class="nav-text">Kelola</span></a>
                <ul aria-expanded="false">
                    {{-- <li><a href="{{ route('merchant.type') }}">Tipe Makanan</a></li>
                    <li><a href="{{ route('merchant.location') }}">Lokasi Makanan</a></li> --}}
                    <li><a href="{{ route('merchant.profile') }}">Profile</a></li>
                </ul>
            </li>
            <li><a data-toggle="modal" data-target=".logoutmode">
                    <i class="icon icon-home"></i><span class="nav-text">Keluar Akun</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'customer')
            <br>
            <li><a href="{{ route('customer.home') }}" aria-expanded="false"><i class="icon icon-home"></i><span
                class="nav-text">Home</span></a></li>
                <li><a href="{{ route('customer.orders') }}" aria-expanded="false">
                    <i class="icon icon-home"></i><span class="nav-text">Order</span>
                </a>
                </li>
                <li><a data-toggle="modal" data-target=".logoutmode">
                    <i class="icon icon-home"></i><span class="nav-text">Keluar Akun</span>
                </a>
            </li>
        @endif
        </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 537px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 389px;"></div></div></div>
  </div>
  
  <div class="modal fade logoutmode" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Keluar Akun</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin keluar dari akun ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
            </div>
        </div>
    </div>
  </div>