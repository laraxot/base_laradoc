@php
$langs = ['it' => 'it', 'en' => 'en'];
@endphp
<div class="mt-8 w-full lg:mt-0 lg:w-64 lg:pl-12">
    <div>
        <label class="text-gray-600 text-xs tracking-widest uppercase" for="version-switch">Lang</label>
        <div x-data
            class="relative w-full bg-white border-b border-gray-600 border-opacity-50 transition-all duration-500 focus-within:border-gray-600">
            <select id="version-switcher" aria-label="Laravel version"
                class="appearance-none flex-1 w-full px-0 py-1 placeholder-gray-900 tracking-wide bg-white focus:outline-none"
                @change="window.location = $event.target.value">
                @foreach ($langs as $key => $display)
                    <option {{ $lang == $key ? 'selected' : '' }}
                        value="{{ url($key . '/docs/' . $currentVersion . $currentSection) }}">
                        {{ $display }}
                    </option>
                @endforeach
            </select>
            <img class="absolute inset-y-0 right-0 mt-2.5 w-2.5 h-2.5 text-gray-900 pointer-events-none"
                src="/img/icons/drop_arrow.min.svg" alt="">
        </div>
    </div>
</div>
