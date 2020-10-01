@extends(config('app.app_shell_template'))

@push('vendor-assets')
<link href="{{ asset('vendor/user-manager/css/app.css') }}" rel="stylesheet">
<livewire:styles />
<script src="{{ asset('vendor/user-manager/js/app.js') }}" defer></script>
@endpush

@section('scaffold')
<div>
    @yield('page')
</div>
@endsection

@push('scripts')
<livewire:scripts />
@endpush
