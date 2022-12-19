@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message','El usuario no tiene los permisos correctos.')
