
@extends('pages.AdminUsers')
@section('usuarios')

<form method="POST" action="{{ route('admin-empresas.store') }}" role="form"
enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 @include('admin-users.form.prt')

</form>
@endsection

