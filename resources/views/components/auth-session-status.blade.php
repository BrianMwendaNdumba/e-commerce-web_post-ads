@props(['status'])

@if ($status)
    <div class="auth_status">
        {{ $status }}
    </div>
@endif
