@if (session()->has('success'))
    <div class="alert alert-success mt-2">
        {{ session('success') }}
    </div>
@endif
