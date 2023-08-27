@role('admin')
    {{ auth()->user()->getNickname() }}
    <x-admin-verified-icon />
    @elserole('operator')
    {{ auth()->user()->getNickname() }}
    <x-operator-verified-icon />
@else
    @if (auth()->user()->has_verified == 1)
        {{ auth()->user()->getNickname() }}
        <x-registrant-verified-icon />
    @else
        {{ auth()->user()->getNickname() }}
    @endif
@endrole
