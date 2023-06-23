<label {{ $attributes }}>
    {{ trim($slot) ?: $attributes->get('label') }}
</label>
