@props(['name', 'prefix' => null])

<div>
    <label class="input input-bordered flex items-center gap-2">
        {{ $prefix }}
        <input class=" grow" name={{ $name }} {{ $attributes }}>
    </label>
    @error($name)
        <div class="text-sm text-error">{{ $message }}</div>
    @enderror
</div>
