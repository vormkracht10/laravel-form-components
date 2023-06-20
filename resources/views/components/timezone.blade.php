<x-dynamic-component :component="$prefix.'select'">
    @foreach($timezones as $timezone)
    <x-dynamic-component :component="$prefix.'option'">
        {{ $timezone }}
    </x-dynamic-component>
    @endforeach
</x-dynamic-component>
