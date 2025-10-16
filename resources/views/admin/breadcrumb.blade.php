{{-- Verifica si hay un elemento en breadcrumb --}}
@if (count($breadcrumbs))
    {{-- Margin botton o margen inferior --}}
    <nav class="mb-2 block">
        <ol class="flex flex-wrap text-slate-700 text-sm">
            @foreach ($breadcrumbs as $item)
                <li class="flex items-center">
                    @unless ($loop->first)
                        <span class="px-2 text-gray-400">/</span>
                    @endunless

                    {{-- Revisar si existe una llave llamada 'href' --}}
                    @isset($item['href'])
                        <a href="{{ $item['href'] }}" class="opacity-60 hover:opacity-100">
                            {{ $item['name'] }}
                        </a>

                    @else
                        {{ $item['name'] }}
                    @endisset

                </li>
            @endforeach
        </ol>
        <!-- El ultimo item aparece resaltado -->
        @if (count($breadcrumbs) > 1)
            <h6 class="mt-2 font-extrabold text-gray-900" style="font-weight: 800 !important;">
                {{ end($breadcrumbs)['name'] }}
            </h6>
        @endif
    </nav>
@endif
