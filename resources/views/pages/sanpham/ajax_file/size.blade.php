@php
    $checkChecked = sizeFirst($sanpham_id, $mau_id, $size_id);
@endphp
@foreach ($sizes as $k => $item)
    @php
        $checkDisabled = sizeFirst($sanpham_id, $mau_id, $item->size_id);
    @endphp
    <li class="HorizontalList__Item block-swatch">
        <input id="option-size{{ $k }}" class="SizeSwatch__Radio size_input" type="radio" name="size"
            value="{{ $item->size_id }}" @if ($checkChecked == true && $size_id == $item->size_id) checked="checked" @endif
            {{ $checkDisabled == false ? 'disabled' : '' }} data-option-position="2">
        <label for="option-size{{ $k }}" class="SizeSwatch size-{{ $item->size_ten }}"
            style="{{ $checkDisabled == false ? 'background-color: #f3f3f3b0;text-decoration: line-through;' : '' }}">
            Size: {{ $item->size_ten }}
        </label>
    </li>
@endforeach
