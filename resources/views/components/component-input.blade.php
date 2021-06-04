<div class="mr-2 mb-3">
    <div>
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        @if($type == 'file')

                    <div
                        x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >
                        <!-- File Input -->

                        <input id="{{ $name }}" wire:model="{{ $name }}" type="{{ $type }}"
                        placeholder="{{ $placeholder }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <!-- Progress Bar -->
                        <div wire:loading wire:target="profile_photo_path">
                            Subiendo Imagen...
                        </div>
                        <div x-show="isUploading">
                            <progress max="100" x-bind:value="progress" style="width:100%"></progress>
                        </div>
                    </div>
                      @else

                      <input  autocomplete="off" id="{{ $name }}" wire:model="{{ $name }}" type="{{ $type }}"
                      placeholder="{{ $placeholder }}"
                      class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                    @endif

    </div>

    @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif

</div>
