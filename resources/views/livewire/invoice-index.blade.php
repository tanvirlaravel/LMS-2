<div>
    <table class="w-full table-auto">
        <tr>
            <th class="px-4 py-2 text-left border">ID</th>
            <th class="px-4 py-2 text-left border">User</th>
            <th class="px-4 py-2 text-left border">Due date</th>
            <th class="px-4 py-2 border">Amount</th>
            <th class="px-4 py-2 border">Paid</th>
            <th class="px-4 py-2 border">Due</th>
            <th class="px-4 py-2 border">Actions</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td class="px-4 py-2 border">{{ $invoice->id }}</td>
                <td class="px-4 py-2 border">{{ $invoice->user->name }}</td>
                <td class="px-4 py-2 border">{{ date('F j, Y', strtotime($invoice->due_date)) }}</td>
                <td class="px-4 py-2 text-center border">${{ $invoice->amount()['total'] }}</td>
                <td class="px-4 py-2 text-center border">${{ $invoice->amount()['paid'] }}</td>
                <td class="px-4 py-2 text-center border">${{ $invoice->amount()['due'] }}</td>
                <td class="px-4 py-2 text-center border">
                    <div class="flex items-center justify-center">
                        <a class="mr-1" href="">
                            @include('components.icons.edit')
                        </a>

                        <a class="mr-1" href="{{ route('invoice-show', $invoice->id) }}">
                            @include('components.icons.eye')
                        </a>

                        <form class="ml-1" onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="invoiceDelete({{ $invoice->id }})">
                            <button type="submit">
                                @include('components.icons.trash')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
