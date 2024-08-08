<div class="col-span-2 flex">
    <label>
        <input type="checkbox" @if($checked) checked @endif value="{{ $value }}" name="{{ $name }}">
        {{ $label }}
    </label>
</div>