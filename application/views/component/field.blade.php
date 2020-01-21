@php $id = uniqid() @endphp
<div class="md-form form-group mx-auto position-relative mt-5">
    <input
            {{$parsley ?? null}}
            required
            type="{{$type ?? 'text' }}"
            name="{{$name}}"
            id="{{$id}}"
            placeholder="{{$label}}"
            value="{{$preval ?? ''}}"
            class="form-control @if (!$error&&!$preval) initial @elseif ($preval && !$error) is-valid @else is-invalid @endif">
    <label
            for="{{$id}}"
            class="{{$error ? "text-danger":"text-muted"}}">
        {{$error ?? "Wajib di isi"}}
    </label>
</div>