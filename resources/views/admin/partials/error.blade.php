<?php 
   $defaultFields = ['name', 'email', 'contact', 'address', 'password', 'password_confirmation'];
   $fields = isset($err) ? $err : $defaultFields;

?>
@foreach ($fields as $item)
@error("$item")
<div class="text-danger">{{ $message }}</div>
@enderror
@endforeach
<br>