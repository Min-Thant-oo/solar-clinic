
<form wire:submit="save" >
    <div>
        <x-input-label for="file-input" class="text-lg font-medium text-gray-900 mb-3" :value="__('Profile Image')" />

        @if (auth()->user()->profile_image == null)
            <span class="inline-block size-[62px] bg-gray-100 rounded-full overflow-hidden shadow-md">
                <svg class="size-full text-gray-300" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white"></rect>
                <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor"></path>
                <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor"></path>
                </svg>
            </span>
        @elseif($image)
            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="inline-block size-[62px] rounded-full object-fit mb-3">
        @elseif (auth()->user()->profile_image)
            <img 
                src="{{ asset('storage/' . auth()->user()->profile_image) }}" 
                class="inline-block size-[62px] rounded-full object-fit" 
                alt="Avatar"
            >
        @endif
        
        
            <label for="file-input" class="sr-only">Choose file</label>
            <input type="file" wire:model='image' name="image" id="file-input" class="mt-1 block w-full border border-gray-300 active:border-indigo-500 active:ring-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm disabled:opacity-50 disabled:pointer-events-none
              file:bg-gray-50 file:border-0
              file:me-4
              file:py-3 file:px-4
             ">
        <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>

    <div class="flex items-center gap-4 mt-6">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <x-action-message class="me-3" on="profile-updated">
            {{ __('Saved.') }}
        </x-action-message>
    </div>
</form>
