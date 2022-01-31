<div class="mt-3 space-y-3">
    @foreach($this->posts as $post)
        <div class="rounded-md shadow-md p-3">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="font-bold">{{ data_get($post, 'name') }}</h5>
            </div>
            <p class="mb-1">
                {{ data_get($post, 'message') }}
            </p>
            <small>
                {{ data_get($post, 'created_at') }} {{ config('app.timezone') }}
            </small>
        </div>
    @endforeach
</div>
