<div class="flex rounded-md relative">
    <div class="flex">
        <div class="px-2 py-3">
            <div class="h-10 w-10">
                <img src="{{ 'data:image/jpeg;base64,' . base64_encode(file_get_contents(\App\Helpers\TelegramHelper::getFullPath($image->path)))}}" alt="{{ $image->id }}" role="img" class="h-full w-full rounded-full overflow-hidden shadow object-cover" />
            </div>
        </div>

        <div class="flex flex-col justify-center pl-3 py-2">
            <p class="text-sm font-bold pb-1">{{ $image->path }}</p>
        </div>
    </div>
</div>
