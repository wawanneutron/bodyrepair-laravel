<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="{{ url('/images/mbs_logo_transparent.png') }}" style="width: 180px;" alt="" class="my-3" title="MBS Body Repair" />
    </div>
    <div class="list-group list-group-flush">
        <a href=" {{ route('info-booking') }} " class="list-group-item list-group-item-action {{ Request::is('customer/dashboard/info-booking*') ? 'active' : '' }}">Booking</a>
        <a href=" {{ route('info-estimasi') }} "
           class="list-group-item list-group-item-action {{ Request::is('customer/dashboard/info-estimasi*') ? 'active' : '' }} {{ Request::is('customer/dashboard/detail-estimasi*') ? 'active' : '' }}">Estimasi</a>
        <a href=" {{ route('info-pengerjaan') }}"
           class="list-group-item list-group-item-action {{ Request::is('customer/dashboard/info-pengerjaan*') ? 'active' : '' }} {{ Request::is('customer/dashboard/detail-pengerjaan*') ? 'active' : '' }}">Tracking
            Pengerjaan</a>
        {{-- <a href="#" class="list-group-item list-group-item-action">Transactions</a> --}}
        <a href="{{ route('account-customer') }}" class="list-group-item list-group-item-action {{ Request::is('customer/dashboard/account-setting*') ? 'active' : '' }}">My Account</a>
    </div>
</div>
