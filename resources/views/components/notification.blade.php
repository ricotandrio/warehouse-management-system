@if ($errors->any())
<div class="mb-3 text-sm text-red-500">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if (session("error"))
<div class="alert alert-danger mt-5 text-red-500">
  {{ session("error") }}
</div>
@endif
@if (session("success"))
<div class="alert alert-danger mt-5 text-red-500">
  {{ session("success") }}
</div>
@endif