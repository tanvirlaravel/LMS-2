<div>

    <table class="w-full table-auto">
        <tr>
            <th class="px-4 py-2 text-left border">Id </th>
            <th class="px-4 py-2 text-left border">Name </th>
            <th class="px-4 py-2 text-left border">Email </th>
            <th class="px-4 py-2 border">Registered</th>
            <th class="px-4 py-2 border">Action</th>
        </tr>

        @foreach ($users as $user)
            <tr>
                <td class="px-4 py-2 border">{{ $user->id }}</td>
                <td class="px-4 py-2 border">{{ $user->name }}</td>
                <td class="px-4 py-2 border">{{ $user->email }}</td>
                <td class="px-4 py-2 text-center border">{{ date('F,j,Y', strtotime($user->created_at)) }}</td>
                <td class="px-4 py-2 text-center border">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('user.edit', $user->id) }}">
                            @include('components.icons.edit')
                        </a>

                        <a class="px-2" href="{{ route('user.show', $user->id) }}">
                            @include('components.icons.eye')
                        </a>

                        <form onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="userDelete({{ $user->id }})">
                            <button type="submit">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>
