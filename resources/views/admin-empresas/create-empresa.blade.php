
@extends('pages.AdminEmpresas')
@section('empresas')

<form method="POST" action="{{ route('admin-empresas.store') }}" role="form"
enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('admin-empresas.form.prt')

</form>
@endsection

