<table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400 ">
        <tr>
            <th scope="col" class="px-0 py-3">
                #
            </th>
            <th scope="col" class="px-4 py-3">
                Name
            </th>
            <th scope="col" class="px-4 py-3">
                Username
            </th>
            <th scope="col" class="px-4 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Joined
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class=" py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($registrants as $item)
            <tr class="dark:bg-transparent">
                <td class="px-0 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if ($item->has_verified == 1)
                        <span class="flex gap-1">
                            {{ $item->getNickname() }}
                            <x-registrant-verified-icon />
                        </span>
                    @else
                        {{ $item->getNickname() }}
                    @endif
                </th>
                <td class="px-4 py-4">
                    {{ $item->username }}
                </td>
                <td class="px-4 py-4">
                    {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->created_at->format('F') == date('F')
                        ? $item->created_at->diffForHumans()
                        : $item->created_at->format('d F, Y') }}
                </td>
                <td class="px-6 py-4">
                    @if ($item->biodata_count == 1)
                        <span class="text-green-500">Has Biodata</span>
                    @else
                        <form action="{{ route('registrant.biodata.store') }}" method="post">
                            @csrf
                            @method('post')
                            <input type="hidden" name="userId" value="{{ $item->id }}">
                            <div class="flex items-center">
                                <button type="submit"
                                    onclick="return confirm('Are you sure want to make biodata for {{ $item->getNickname() }}?')">
                                    <span class="font-medium text-red-600 hover:underline">No biodata</span>
                                </button>
                            </div>
                        </form>
                    @endif
                </td>
                <td class="py-4 flex items-center gap-1">
                    @hasrole('operator')
                        @if ($item->has_verified == 1)
                            <form action="{{ route('registrant.unverify', $item) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="flex items-center">
                                    <button type="submit">
                                        <span class="font-medium text-yellow-400 hover:underline">Unverified</span>
                                    </button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('registrant.verify', $item) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="flex items-center">
                                    <button type="submit">
                                        <span class="font-medium text-sky-500 hover:underline">Verified</span>
                                    </button>
                                </div>
                            </form>
                        @endif
                        |
                    @endhasrole
                    @hasrole('admin')
                        <form action="{{ route('registrant.promote', $item) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="flex items-center">
                                <button type="submit"
                                    onclick="return confirm('Are you sure want to promote {{ $item->getNickname() }}?')">
                                    <span class="font-medium text-sky-500 hover:underline">Promote</span>
                                </button>
                            </div>
                        </form>
                        |
                    @endhasrole
                    <a href="{{ request()->routeIs('registrant.index') ? route('registrant.show', $item) : route('operator.show', $item) }}"
                        class="font-medium text-fuchsia-500 dark:text-fuchsia-500 hover:underline"> Show</a>
                    |
                    <form action="{{ route('registrant.delete', $item) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="flex items-center">
                            <button type="submit"
                                @if ($item->biodata_count == 1 || $item->has_verified == 1) onclick="return confirm('Are you sure want to delete {{ $item->getNickname() }}?')"> @endif
                                <span class="font-medium text-red-600 hover:underline">Delete</span>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-center" colspan="8">
                    <div class="py-6 text-md lg:text-lg animate-pulse text-red-600 font-medium mx-1">
                        <span class="underline">{{ Str::title(request()->keyword) }}</span>
                        is not on this list.
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
