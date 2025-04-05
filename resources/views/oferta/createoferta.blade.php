@extends('pages.Oferta')

@section('create')

<form style="box-shadow: 0 15px 1rem 0 rgba(0, 0, 0, 0.2); overflow-x:hidden; width: clamp(21.875rem, 10.714rem + 29.762vw, 37.5rem); border-radius: 0 0  15px 15px;" method="POST" action="{{ route('oferta.store') }}" role="form"
    enctype="multipart/form-data">
    <div class="card-header">
        <span class="card-title">{{ __('Crear') }} oferta</span>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('oferta.form.prt')

</form>
@endsection