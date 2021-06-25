<li>

    <div class="form-inline my-2">
        <div class="input-group" data-widget="sidebar" data-arrow-sign="&raquo;">

            {{-- Search input --}}
            <input class="form-control form-control-sidebar" disabled
                @isset($item['id']) id="{{ $item['id'] }}" @endisset
                placeholder="{{ $item['text'] }}"
                aria-label="{{ $item['text'] }}">

            {{-- Search button --}}


        </div>
    </div>

</li>
