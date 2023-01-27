<div class="mb-4">
    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="flex mb-4 -mx-4">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input wire:model="name" type="text" class="lms-input">

                @error('name')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model="email" type="email" class="lms-input">

                @error('email')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input wire:model="phone" type="tel" class="lms-input">

                @error('phone')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
        </div>

        @include('components.wire-loading-btn')

    </form>

    <h3 class="mb-4 text-lg font-bold">Notes</h3>
    @foreach ($notes as $note)
        <div class="p-4 mb-4 border border-gray-100">{{ $note->description }}</div>
    @endforeach


    <h4 class="mb-2 font-bold">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model.lazy="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>

</div>
