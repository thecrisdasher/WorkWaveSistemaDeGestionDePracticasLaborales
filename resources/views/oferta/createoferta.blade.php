
@extends('pages.dashboard')
@section('create')

<form method="POST" action="{{ route('oferta.store') }}" role="form"
enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('oferta.form.prt')

</form>
@endsection


