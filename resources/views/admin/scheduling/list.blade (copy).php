@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Scheduling')
{{-- vendor styles --}}
@section('vendor-styles')
<?php  error_reporting(0); ?>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection
@section('content')
<!-- users list start -->
<style type="text/css">
  i.bx.bx-trash-alt {
    color: red;
}
.btn {
    display: inline-block;
    font-weight: 400;
    color: #727E8C;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 0 solid transparent;
    padding: -0.533rem 9.5rem;
    /* font-size: 1rem; */
    /* line-height: 1.6rem; */
    border-radius: 0.267rem;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 2px;
    color: white;
}
 
span {
  content: "\0031";
}
.ww{
  float: left !important;
    border-radius: 34px;
    width: 25px;
}
table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
}

table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 0px !important;
    padding-left: 1px !important;
}
.form-group.f {
    margin-left: 105px;
}
</style>
<style type="text/css">
 
 
 
fieldset {
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0;
}
legend {
    display: block;
    width: 100%;
    padding: 0;
    margin-bottom: 20px;
    font-size: 21px;
    line-height: inherit;
    color: #333;
    border: 0;
    border-bottom: 1px solid #e5e5e5;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
}
input[type="search"] {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
input[type="checkbox"],
input[type="radio"] {
    margin: 4px 0 0;
    margin-top: 1px\9;
    line-height: normal;
}
input[type="file"] {
    display: block;
}
input[type="range"] {
    display: block;
    width: 100%;
}
select[multiple],
select[size] {
    height: auto;
}
input[type="file"]:focus,
input[type="checkbox"]:focus,
input[type="radio"]:focus {
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}
output {
    display: block;
    padding-top: 7px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
}
.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, -webkit-box-shadow ease-in-out 0.15s;
    -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
.form-control:focus {
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
.form-control::-moz-placeholder {
    color: #999;
    opacity: 1;
}
.form-control:-ms-input-placeholder {
    color: #999;
}
.form-control::-webkit-input-placeholder {
    color: #999;
}
.form-control::-ms-expand {
    background-color: transparent;
    border: 0;
}
.form-control[disabled],
.form-control[readonly],
fieldset[disabled] .form-control {
    background-color: #eee;
    opacity: 1;
}
.form-control[disabled],
fieldset[disabled] .form-control {
    cursor: not-allowed;
}
textarea.form-control {
    height: auto;
}
input[type="search"] {
    -webkit-appearance: none;
}
@media screen and (-webkit-min-device-pixel-ratio: 0) {
    input[type="date"].form-control,
    input[type="time"].form-control,
    input[type="datetime-local"].form-control,
    input[type="month"].form-control {
        line-height: 34px;
    }
    .input-group-sm input[type="date"],
    .input-group-sm input[type="time"],
    .input-group-sm input[type="datetime-local"],
    .input-group-sm input[type="month"],
    input[type="date"].input-sm,
    input[type="time"].input-sm,
    input[type="datetime-local"].input-sm,
    input[type="month"].input-sm {
        line-height: 30px;
    }
    .input-group-lg input[type="date"],
    .input-group-lg input[type="time"],
    .input-group-lg input[type="datetime-local"],
    .input-group-lg input[type="month"],
    input[type="date"].input-lg,
    input[type="time"].input-lg,
    input[type="datetime-local"].input-lg,
    input[type="month"].input-lg {
        line-height: 46px;
    }
}
.form-group {
    margin-bottom: 15px;
}
.checkbox,
.radio {
    position: relative;
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
}
.checkbox label,
.radio label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.checkbox input[type="checkbox"],
.checkbox-inline input[type="checkbox"],
.radio input[type="radio"],
.radio-inline input[type="radio"] {
    position: absolute;
    margin-top: 4px\9;
    margin-left: -20px;
}
.checkbox + .checkbox,
.radio + .radio {
    margin-top: -5px;
}
.checkbox-inline,
.radio-inline {
    position: relative;
    display: inline-block;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    vertical-align: middle;
    cursor: pointer;
}
.checkbox-inline + .checkbox-inline,
.radio-inline + .radio-inline {
    margin-top: 0;
    margin-left: 10px;
}
fieldset[disabled] input[type="checkbox"],
fieldset[disabled] input[type="radio"],
input[type="checkbox"].disabled,
input[type="checkbox"][disabled],
input[type="radio"].disabled,
input[type="radio"][disabled] {
    cursor: not-allowed;
}
.checkbox-inline.disabled,
.radio-inline.disabled,
fieldset[disabled] .checkbox-inline,
fieldset[disabled] .radio-inline {
    cursor: not-allowed;
}
.checkbox.disabled label,
.radio.disabled label,
fieldset[disabled] .checkbox label,
fieldset[disabled] .radio label {
    cursor: not-allowed;
}
.form-control-static {
    min-height: 34px;
    padding-top: 7px;
    padding-bottom: 7px;
    margin-bottom: 0;
}
.form-control-static.input-lg,
.form-control-static.input-sm {
    padding-right: 0;
    padding-left: 0;
}
.input-sm {
    height: 30px;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
select.input-sm {
    height: 30px;
    line-height: 30px;
}
select[multiple].input-sm,
textarea.input-sm {
    height: auto;
}
.form-group-sm .form-control {
    height: 30px;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.form-group-sm select.form-control {
    height: 30px;
    line-height: 30px;
}
.form-group-sm select[multiple].form-control,
.form-group-sm textarea.form-control {
    height: auto;
}
.form-group-sm .form-control-static {
    height: 30px;
    min-height: 32px;
    padding: 6px 10px;
    font-size: 12px;
    line-height: 1.5;
}
.input-lg {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
select.input-lg {
    height: 46px;
    line-height: 46px;
}
select[multiple].input-lg,
textarea.input-lg {
    height: auto;
}
.form-group-lg .form-control {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.form-group-lg select.form-control {
    height: 46px;
    line-height: 46px;
}
.form-group-lg select[multiple].form-control,
.form-group-lg textarea.form-control {
    height: auto;
}
.form-group-lg .form-control-static {
    height: 46px;
    min-height: 38px;
    padding: 11px 16px;
    font-size: 18px;
    line-height: 1.3333333;
}
.has-feedback {
    position: relative;
}
.has-feedback .form-control {
    padding-right: 42.5px;
}
.form-control-feedback {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;
}
.form-group-lg .form-control + .form-control-feedback,
.input-group-lg + .form-control-feedback,
.input-lg + .form-control-feedback {
    width: 46px;
    height: 46px;
    line-height: 46px;
}
.form-group-sm .form-control + .form-control-feedback,
.input-group-sm + .form-control-feedback,
.input-sm + .form-control-feedback {
    width: 30px;
    height: 30px;
    line-height: 30px;
}
.has-success .checkbox,
.has-success .checkbox-inline,
.has-success .control-label,
.has-success .help-block,
.has-success .radio,
.has-success .radio-inline,
.has-success.checkbox label,
.has-success.checkbox-inline label,
.has-success.radio label,
.has-success.radio-inline label {
    color: #3c763d;
}
.has-success .form-control {
    border-color: #3c763d;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.has-success .form-control:focus {
    border-color: #2b542c;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #67b168;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #67b168;
}
.has-success .input-group-addon {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #3c763d;
}
.has-success .form-control-feedback {
    color: #3c763d;
}
.has-warning .checkbox,
.has-warning .checkbox-inline,
.has-warning .control-label,
.has-warning .help-block,
.has-warning .radio,
.has-warning .radio-inline,
.has-warning.checkbox label,
.has-warning.checkbox-inline label,
.has-warning.radio label,
.has-warning.radio-inline label {
    color: #8a6d3b;
}
.has-warning .form-control {
    border-color: #8a6d3b;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.has-warning .form-control:focus {
    border-color: #66512c;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #c0a16b;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #c0a16b;
}
.has-warning .input-group-addon {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #8a6d3b;
}
.has-warning .form-control-feedback {
    color: #8a6d3b;
}
.has-error .checkbox,
.has-error .checkbox-inline,
.has-error .control-label,
.has-error .help-block,
.has-error .radio,
.has-error .radio-inline,
.has-error.checkbox label,
.has-error.checkbox-inline label,
.has-error.radio label,
.has-error.radio-inline label {
    color: #a94442;
}
.has-error .form-control {
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.has-error .form-control:focus {
    border-color: #843534;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #ce8483;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #ce8483;
}
.has-error .input-group-addon {
    color: #a94442;
    background-color: #f2dede;
    border-color: #a94442;
}
.has-error .form-control-feedback {
    color: #a94442;
}
.has-feedback label ~ .form-control-feedback {
    top: 25px;
}
.has-feedback label.sr-only ~ .form-control-feedback {
    top: 0;
}
.help-block {
    display: block;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #737373;
}
@media (min-width: 768px) {
    .form-inline .form-group {
        display: inline-block;
        margin-bottom: 0;
        vertical-align: middle;
    }
    .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
    }
    .form-inline .form-control-static {
        display: inline-block;
    }
    .form-inline .input-group {
        display: inline-table;
        vertical-align: middle;
    }
    .form-inline .input-group .form-control,
    .form-inline .input-group .input-group-addon,
    .form-inline .input-group .input-group-btn {
        width: auto;
    }
    .form-inline .input-group > .form-control {
        width: 100%;
    }
    .form-inline .control-label {
        margin-bottom: 0;
        vertical-align: middle;
    }
    .form-inline .checkbox,
    .form-inline .radio {
        display: inline-block;
        margin-top: 0;
        margin-bottom: 0;
        vertical-align: middle;
    }
    .form-inline .checkbox label,
    .form-inline .radio label {
        padding-left: 0;
    }
    .form-inline .checkbox input[type="checkbox"],
    .form-inline .radio input[type="radio"] {
        position: relative;
        margin-left: 0;
    }
    .form-inline .has-feedback .form-control-feedback {
        top: 0;
    }
}
.form-horizontal .checkbox,
.form-horizontal .checkbox-inline,
.form-horizontal .radio,
.form-horizontal .radio-inline {
    padding-top: 7px;
    margin-top: 0;
    margin-bottom: 0;
}
.form-horizontal .checkbox,
.form-horizontal .radio {
    min-height: 27px;
}
.form-horizontal .form-group {
    margin-right: -15px;
    margin-left: -15px;
}
@media (min-width: 768px) {
    .form-horizontal .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
    }
}
.form-horizontal .has-feedback .form-control-feedback {
    right: 15px;
}
@media (min-width: 768px) {
    .form-horizontal .form-group-lg .control-label {
        padding-top: 11px;
        font-size: 18px;
    }
}
@media (min-width: 768px) {
    .form-horizontal .form-group-sm .control-label {
        padding-top: 6px;
        font-size: 12px;
    }
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.btn.active.focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn:active:focus,
.btn:focus {
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
}
.btn.focus,
.btn:focus,
.btn:hover {
    color: #333;
    text-decoration: none;
}
.btn.active,
.btn:active {
    background-image: none;
    outline: 0;
    -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
.btn.disabled,
.btn[disabled],
fieldset[disabled] .btn {
    cursor: not-allowed;
    filter: alpha(opacity=65);
    -webkit-box-shadow: none;
    box-shadow: none;
    opacity: 0.65;
}
a.btn.disabled,
fieldset[disabled] a.btn {
    pointer-events: none;
}
.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn-default.focus,
.btn-default:focus {
    color: #333;
    background-color: #e6e6e6;
    border-color: #8c8c8c;
}
.btn-default:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.btn-default.active,
.btn-default:active,
.open > .dropdown-toggle.btn-default {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad;
}
.btn-default.active.focus,
.btn-default.active:focus,
.btn-default.active:hover,
.btn-default:active.focus,
.btn-default:active:focus,
.btn-default:active:hover,
.open > .dropdown-toggle.btn-default.focus,
.open > .dropdown-toggle.btn-default:focus,
.open > .dropdown-toggle.btn-default:hover {
    color: #333;
    background-color: #d4d4d4;
    border-color: #8c8c8c;
}
.btn-default.active,
.btn-default:active,
.open > .dropdown-toggle.btn-default {
    background-image: none;
}
.btn-default.disabled.focus,
.btn-default.disabled:focus,
.btn-default.disabled:hover,
.btn-default[disabled].focus,
.btn-default[disabled]:focus,
.btn-default[disabled]:hover,
fieldset[disabled] .btn-default.focus,
fieldset[disabled] .btn-default:focus,
fieldset[disabled] .btn-default:hover {
    background-color: #fff;
    border-color: #ccc;
}
.btn-default .badge {
    color: #fff;
    background-color: #333;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.btn-primary.focus,
.btn-primary:focus {
    color: #fff;
    background-color: #286090;
    border-color: #122b40;
}
.btn-primary:hover {
    color: #fff;
    background-color: #286090;
    border-color: #204d74;
}
.btn-primary.active,
.btn-primary:active,
.open > .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #286090;
    border-color: #204d74;
}
.btn-primary.active.focus,
.btn-primary.active:focus,
.btn-primary.active:hover,
.btn-primary:active.focus,
.btn-primary:active:focus,
.btn-primary:active:hover,
.open > .dropdown-toggle.btn-primary.focus,
.open > .dropdown-toggle.btn-primary:focus,
.open > .dropdown-toggle.btn-primary:hover {
    color: #fff;
    background-color: #204d74;
    border-color: #122b40;
}
.btn-primary.active,
.btn-primary:active,
.open > .dropdown-toggle.btn-primary {
    background-image: none;
}
.btn-primary.disabled.focus,
.btn-primary.disabled:focus,
.btn-primary.disabled:hover,
.btn-primary[disabled].focus,
.btn-primary[disabled]:focus,
.btn-primary[disabled]:hover,
fieldset[disabled] .btn-primary.focus,
fieldset[disabled] .btn-primary:focus,
fieldset[disabled] .btn-primary:hover {
    background-color: #337ab7;
    border-color: #2e6da4;
}
.btn-primary .badge {
    color: #337ab7;
    background-color: #fff;
}
.btn-success {
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.btn-success.focus,
.btn-success:focus {
    color: #fff;
    background-color: #449d44;
    border-color: #255625;
}
.btn-success:hover {
    color: #fff;
    background-color: #449d44;
    border-color: #398439;
}
.btn-success.active,
.btn-success:active,
.open > .dropdown-toggle.btn-success {
    color: #fff;
    background-color: #449d44;
    border-color: #398439;
}
.btn-success.active.focus,
.btn-success.active:focus,
.btn-success.active:hover,
.btn-success:active.focus,
.btn-success:active:focus,
.btn-success:active:hover,
.open > .dropdown-toggle.btn-success.focus,
.open > .dropdown-toggle.btn-success:focus,
.open > .dropdown-toggle.btn-success:hover {
    color: #fff;
    background-color: #398439;
    border-color: #255625;
}
.btn-success.active,
.btn-success:active,
.open > .dropdown-toggle.btn-success {
    background-image: none;
}
.btn-success.disabled.focus,
.btn-success.disabled:focus,
.btn-success.disabled:hover,
.btn-success[disabled].focus,
.btn-success[disabled]:focus,
.btn-success[disabled]:hover,
fieldset[disabled] .btn-success.focus,
fieldset[disabled] .btn-success:focus,
fieldset[disabled] .btn-success:hover {
    background-color: #5cb85c;
    border-color: #4cae4c;
}
.btn-success .badge {
    color: #5cb85c;
    background-color: #fff;
}
.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn-info.focus,
.btn-info:focus {
    color: #fff;
    background-color: #31b0d5;
    border-color: #1b6d85;
}
.btn-info:hover {
    color: #fff;
    background-color: #31b0d5;
    border-color: #269abc;
}
.btn-info.active,
.btn-info:active,
.open > .dropdown-toggle.btn-info {
    color: #fff;
    background-color: #31b0d5;
    border-color: #269abc;
}
.btn-info.active.focus,
.btn-info.active:focus,
.btn-info.active:hover,
.btn-info:active.focus,
.btn-info:active:focus,
.btn-info:active:hover,
.open > .dropdown-toggle.btn-info.focus,
.open > .dropdown-toggle.btn-info:focus,
.open > .dropdown-toggle.btn-info:hover {
    color: #fff;
    background-color: #269abc;
    border-color: #1b6d85;
}
.btn-info.active,
.btn-info:active,
.open > .dropdown-toggle.btn-info {
    background-image: none;
}
.btn-info.disabled.focus,
.btn-info.disabled:focus,
.btn-info.disabled:hover,
.btn-info[disabled].focus,
.btn-info[disabled]:focus,
.btn-info[disabled]:hover,
fieldset[disabled] .btn-info.focus,
fieldset[disabled] .btn-info:focus,
fieldset[disabled] .btn-info:hover {
    background-color: #5bc0de;
    border-color: #46b8da;
}
.btn-info .badge {
    color: #5bc0de;
    background-color: #fff;
}
.btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}
.btn-warning.focus,
.btn-warning:focus {
    color: #fff;
    background-color: #ec971f;
    border-color: #985f0d;
}
.btn-warning:hover {
    color: #fff;
    background-color: #ec971f;
    border-color: #d58512;
}
.btn-warning.active,
.btn-warning:active,
.open > .dropdown-toggle.btn-warning {
    color: #fff;
    background-color: #ec971f;
    border-color: #d58512;
}
.btn-warning.active.focus,
.btn-warning.active:focus,
.btn-warning.active:hover,
.btn-warning:active.focus,
.btn-warning:active:focus,
.btn-warning:active:hover,
.open > .dropdown-toggle.btn-warning.focus,
.open > .dropdown-toggle.btn-warning:focus,
.open > .dropdown-toggle.btn-warning:hover {
    color: #fff;
    background-color: #d58512;
    border-color: #985f0d;
}
.btn-warning.active,
.btn-warning:active,
.open > .dropdown-toggle.btn-warning {
    background-image: none;
}
.btn-warning.disabled.focus,
.btn-warning.disabled:focus,
.btn-warning.disabled:hover,
.btn-warning[disabled].focus,
.btn-warning[disabled]:focus,
.btn-warning[disabled]:hover,
fieldset[disabled] .btn-warning.focus,
fieldset[disabled] .btn-warning:focus,
fieldset[disabled] .btn-warning:hover {
    background-color: #f0ad4e;
    border-color: #eea236;
}
.btn-warning .badge {
    color: #f0ad4e;
    background-color: #fff;
}
.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}
.btn-danger.focus,
.btn-danger:focus {
    color: #fff;
    background-color: #c9302c;
    border-color: #761c19;
}
.btn-danger:hover {
    color: #fff;
    background-color: #c9302c;
    border-color: #ac2925;
}
.btn-danger.active,
.btn-danger:active,
.open > .dropdown-toggle.btn-danger {
    color: #fff;
    background-color: #c9302c;
    border-color: #ac2925;
}
.btn-danger.active.focus,
.btn-danger.active:focus,
.btn-danger.active:hover,
.btn-danger:active.focus,
.btn-danger:active:focus,
.btn-danger:active:hover,
.open > .dropdown-toggle.btn-danger.focus,
.open > .dropdown-toggle.btn-danger:focus,
.open > .dropdown-toggle.btn-danger:hover {
    color: #fff;
    background-color: #ac2925;
    border-color: #761c19;
}
.btn-danger.active,
.btn-danger:active,
.open > .dropdown-toggle.btn-danger {
    background-image: none;
}
.btn-danger.disabled.focus,
.btn-danger.disabled:focus,
.btn-danger.disabled:hover,
.btn-danger[disabled].focus,
.btn-danger[disabled]:focus,
.btn-danger[disabled]:hover,
fieldset[disabled] .btn-danger.focus,
fieldset[disabled] .btn-danger:focus,
fieldset[disabled] .btn-danger:hover {
    background-color: #d9534f;
    border-color: #d43f3a;
}
.btn-danger .badge {
    color: #d9534f;
    background-color: #fff;
}
.btn-link {
    font-weight: 400;
    color: #337ab7;
    border-radius: 0;
}
.btn-link,
.btn-link.active,
.btn-link:active,
.btn-link[disabled],
fieldset[disabled] .btn-link {
    background-color: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.btn-link,
.btn-link:active,
.btn-link:focus,
.btn-link:hover {
    border-color: transparent;
}
.btn-link:focus,
.btn-link:hover {
    color: #23527c;
    text-decoration: underline;
    background-color: transparent;
}
.btn-link[disabled]:focus,
.btn-link[disabled]:hover,
fieldset[disabled] .btn-link:focus,
fieldset[disabled] .btn-link:hover {
    color: #777;
    text-decoration: none;
}
.btn-group-lg > .btn,
.btn-lg {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
.btn-group-sm > .btn,
.btn-sm {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.btn-group-xs > .btn,
.btn-xs {
    padding: 1px 5px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
.btn-block {
    display: block;
    width: 100%;
}
.btn-block + .btn-block {
    margin-top: 5px;
}
input[type="button"].btn-block,
input[type="reset"].btn-block,
input[type="submit"].btn-block {
    width: 100%;
}
.fade {
    opacity: 0;
    -webkit-transition: opacity 0.15s linear;
    -o-transition: opacity 0.15s linear;
    transition: opacity 0.15s linear;
}
.fade.in {
    opacity: 1;
}
.collapse {
    display: none;
}
.collapse.in {
    display: block;
}
tr.collapse.in {
    display: table-row;
}
tbody.collapse.in {
    display: table-row-group;
}
.collapsing {
    position: relative;
    height: 0;
    overflow: hidden;
    -webkit-transition-timing-function: ease;
    -o-transition-timing-function: ease;
    transition-timing-function: ease;
    -webkit-transition-duration: 0.35s;
    -o-transition-duration: 0.35s;
    transition-duration: 0.35s;
    -webkit-transition-property: height, visibility;
    -o-transition-property: height, visibility;
    transition-property: height, visibility;
}
.caret {
    display: inline-block;
    width: 0;
    height: 0;
    margin-left: 2px;
    vertical-align: middle;
    border-top: 4px dashed;
    border-top: 4px solid\9;
    border-right: 4px solid transparent;
    border-left: 4px solid transparent;
}
.dropdown,
.dropup {
    position: relative;
}
.dropdown-toggle:focus {
    outline: 0;
}
.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}
.dropdown-menu.pull-right {
    right: 0;
    left: auto;
}
.dropdown-menu .divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #e5e5e5;
}
.dropdown-menu > li > a {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: 400;
    line-height: 1.42857143;
    color: #333;
    white-space: nowrap;
}
.dropdown-menu > li > a:focus,
.dropdown-menu > li > a:hover {
    color: #262626;
    text-decoration: none;
    background-color: #f5f5f5;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:focus,
.dropdown-menu > .active > a:hover {
    color: #fff;
    text-decoration: none;
    background-color: #337ab7;
    outline: 0;
}
.dropdown-menu > .disabled > a,
.dropdown-menu > .disabled > a:focus,
.dropdown-menu > .disabled > a:hover {
    color: #777;
}
.dropdown-menu > .disabled > a:focus,
.dropdown-menu > .disabled > a:hover {
    text-decoration: none;
    cursor: not-allowed;
    background-color: transparent;
    background-image: none;
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}
.open > .dropdown-menu {
    display: block;
}
.open > a {
    outline: 0;
}
.dropdown-menu-right {
    right: 0;
    left: auto;
}
.dropdown-menu-left {
    right: auto;
    left: 0;
}
.dropdown-header {
    display: block;
    padding: 3px 20px;
    font-size: 12px;
    line-height: 1.42857143;
    color: #777;
    white-space: nowrap;
}
.dropdown-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 990;
}
.pull-right > .dropdown-menu {
    right: 0;
    left: auto;
}
.dropup .caret,
/*.navbar-fixed-bottom .dropdown .caret {
    content: "";
    border-top: 0;
    border-bottom: 4px dashed;
    border-bottom: 4px solid\9;
}*/
/*.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
    top: auto;
    bottom: 100%;
    margin-bottom: 2px;
}*/
 
.btn-group,
.btn-group-vertical {
    position: relative;
    display: inline-block;
    vertical-align: middle;
}
.btn-group-vertical > .btn,
.btn-group > .btn {
    position: relative;
    float: left;
}
.btn-group-vertical > .btn.active,
.btn-group-vertical > .btn:active,
.btn-group-vertical > .btn:focus,
.btn-group-vertical > .btn:hover,
.btn-group > .btn.active,
.btn-group > .btn:active,
.btn-group > .btn:focus,
.btn-group > .btn:hover {
    z-index: 2;
}
.btn-group .btn + .btn,
.btn-group .btn + .btn-group,
.btn-group .btn-group + .btn,
.btn-group .btn-group + .btn-group {
    margin-left: -1px;
}
.btn-toolbar {
    margin-left: -5px;
}
.btn-toolbar .btn,
.btn-toolbar .btn-group,
.btn-toolbar .input-group {
    float: left;
}
.btn-toolbar > .btn,
.btn-toolbar > .btn-group,
.btn-toolbar > .input-group {
    margin-left: 5px;
}
.btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
    border-radius: 0;
}
.btn-group > .btn:first-child {
    margin-left: 0;
}
.btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group > .btn:last-child:not(:first-child),
.btn-group > .dropdown-toggle:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.btn-group > .btn-group {
    float: left;
}
.btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
    border-radius: 0;
}
.btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.btn-group .dropdown-toggle:active,
.btn-group.open .dropdown-toggle {
    outline: 0;
}
.btn-group > .btn + .dropdown-toggle {
    padding-right: 8px;
    padding-left: 8px;
}
.btn-group > .btn-lg + .dropdown-toggle {
    padding-right: 12px;
    padding-left: 12px;
}
.btn-group.open .dropdown-toggle {
    -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}
.btn-group.open .dropdown-toggle.btn-link {
    -webkit-box-shadow: none;
    box-shadow: none;
}
.btn .caret {
    margin-left: 0;
}
.btn-lg .caret {
    border-width: 5px 5px 0;
    border-bottom-width: 0;
}
.dropup .btn-lg .caret {
    border-width: 0 5px 5px;
}
.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group,
.btn-group-vertical > .btn-group > .btn {
    display: block;
    float: none;
    width: 100%;
    max-width: 100%;
}
.btn-group-vertical > .btn-group > .btn {
    float: none;
}
.btn-group-vertical > .btn + .btn,
.btn-group-vertical > .btn + .btn-group,
.btn-group-vertical > .btn-group + .btn,
.btn-group-vertical > .btn-group + .btn-group {
    margin-top: -1px;
    margin-left: 0;
}
.btn-group-vertical > .btn:not(:first-child):not(:last-child) {
    border-radius: 0;
}
.btn-group-vertical > .btn:first-child:not(:last-child) {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
.btn-group-vertical > .btn:last-child:not(:first-child) {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
.btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
    border-radius: 0;
}
.btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}
.btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.btn-group-justified {
    display: table;
    width: 100%;
    table-layout: fixed;
    border-collapse: separate;
}
.btn-group-justified > .btn,
.btn-group-justified > .btn-group {
    display: table-cell;
    float: none;
    width: 1%;
}
.btn-group-justified > .btn-group .btn {
    width: 100%;
}
.btn-group-justified > .btn-group .dropdown-menu {
    left: auto;
}
[data-toggle="buttons"] > .btn input[type="checkbox"],
[data-toggle="buttons"] > .btn input[type="radio"],
[data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"],
[data-toggle="buttons"] > .btn-group > .btn input[type="radio"] {
    position: absolute;
    clip: rect(0, 0, 0, 0);
    pointer-events: none;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}
.input-group[class*="col-"] {
    float: none;
    padding-right: 0;
    padding-left: 0;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}
.input-group .form-control:focus {
    z-index: 3;
}
.input-group-lg > .form-control,
.input-group-lg > .input-group-addon,
.input-group-lg > .input-group-btn > .btn {
    height: 46px;
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
    border-radius: 6px;
}
select.input-group-lg > .form-control,
select.input-group-lg > .input-group-addon,
select.input-group-lg > .input-group-btn > .btn {
    height: 46px;
    line-height: 46px;
}
select[multiple].input-group-lg > .form-control,
select[multiple].input-group-lg > .input-group-addon,
select[multiple].input-group-lg > .input-group-btn > .btn,
textarea.input-group-lg > .form-control,
textarea.input-group-lg > .input-group-addon,
textarea.input-group-lg > .input-group-btn > .btn {
    height: auto;
}
.input-group-sm > .form-control,
.input-group-sm > .input-group-addon,
.input-group-sm > .input-group-btn > .btn {
    height: 30px;
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
    border-radius: 3px;
}
select.input-group-sm > .form-control,
select.input-group-sm > .input-group-addon,
select.input-group-sm > .input-group-btn > .btn {
    height: 30px;
    line-height: 30px;
}
select[multiple].input-group-sm > .form-control,
select[multiple].input-group-sm > .input-group-addon,
select[multiple].input-group-sm > .input-group-btn > .btn,
textarea.input-group-sm > .form-control,
textarea.input-group-sm > .input-group-addon,
textarea.input-group-sm > .input-group-btn > .btn {
    height: auto;
}
.input-group .form-control,
.input-group-addon,
.input-group-btn {
    display: table-cell;
}
.input-group .form-control:not(:first-child):not(:last-child),
.input-group-addon:not(:first-child):not(:last-child),
.input-group-btn:not(:first-child):not(:last-child) {
    border-radius: 0;
}
.input-group-addon,
.input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #eee;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.input-group-addon.input-sm {
    padding: 5px 10px;
    font-size: 12px;
    border-radius: 3px;
}
.input-group-addon.input-lg {
    padding: 10px 16px;
    font-size: 18px;
    border-radius: 6px;
}
.input-group-addon input[type="checkbox"],
.input-group-addon input[type="radio"] {
    margin-top: 0;
}
.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .btn-group > .btn,
.input-group-btn:first-child > .dropdown-toggle,
.input-group-btn:last-child > .btn-group:not(:last-child) > .btn,
.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.input-group-addon:first-child {
    border-right: 0;
}
.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:first-child > .btn-group:not(:first-child) > .btn,
.input-group-btn:first-child > .btn:not(:first-child),
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .btn-group > .btn,
.input-group-btn:last-child > .dropdown-toggle {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.input-group-addon:last-child {
    border-left: 0;
}
.input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap;
}
.input-group-btn > .btn {
    position: relative;
}
.input-group-btn > .btn + .btn {
    margin-left: -1px;
}
.input-group-btn > .btn:active,
.input-group-btn > .btn:focus,
.input-group-btn > .btn:hover {
    z-index: 2;
}
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .btn-group {
    margin-right: -1px;
}
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav > li {
    position: relative;
    display: block;
}
.nav > li > a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
.nav > li > a:focus,
.nav > li > a:hover {
    text-decoration: none;
    background-color: #eee;
}
.nav > li.disabled > a {
    color: #777;
}
.nav > li.disabled > a:focus,
.nav > li.disabled > a:hover {
    color: #777;
    text-decoration: none;
    cursor: not-allowed;
    background-color: transparent;
}
.nav .open > a,
.nav .open > a:focus,
.nav .open > a:hover {
    background-color: #eee;
    border-color: #337ab7;
}
.nav .nav-divider {
    height: 1px;
    margin: 9px 0;
    overflow: hidden;
    background-color: #e5e5e5;
}
.nav > li > a > img {
    max-width: none;
}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav-tabs > li {
    float: left;
    margin-bottom: -1px;
}
.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav-tabs > li > a:hover {
    border-color: #eee #eee #ddd;
}
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs.nav-justified {
    width: 100%;
    border-bottom: 0;
}
.nav-tabs.nav-justified > li {
    float: none;
}
.nav-tabs.nav-justified > li > a {
    margin-bottom: 5px;
    text-align: center;
}
.nav-tabs.nav-justified > .dropdown .dropdown-menu {
    top: auto;
    left: auto;
}
@media (min-width: 768px) {
    .nav-tabs.nav-justified > li {
        display: table-cell;
        width: 1%;
    }
    .nav-tabs.nav-justified > li > a {
        margin-bottom: 0;
    }
}
.nav-tabs.nav-justified > li > a {
    margin-right: 0;
    border-radius: 4px;
}
.nav-tabs.nav-justified > .active > a,
.nav-tabs.nav-justified > .active > a:focus,
.nav-tabs.nav-justified > .active > a:hover {
    border: 1px solid #ddd;
}
@media (min-width: 768px) {
    .nav-tabs.nav-justified > li > a {
        border-bottom: 1px solid #ddd;
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs.nav-justified > .active > a,
    .nav-tabs.nav-justified > .active > a:focus,
    .nav-tabs.nav-justified > .active > a:hover {
        border-bottom-color: #fff;
    }
}
.nav-pills > li {
    float: left;
}
.nav-pills > li > a {
    border-radius: 4px;
}
.nav-pills > li + li {
    margin-left: 2px;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:focus,
.nav-pills > li.active > a:hover {
    color: #fff;
    background-color: #337ab7;
}
.nav-stacked > li {
    float: none;
}
.nav-stacked > li + li {
    margin-top: 2px;
    margin-left: 0;
}
.nav-justified {
    width: 100%;
}
.nav-justified > li {
    float: none;
}
.nav-justified > li > a {
    margin-bottom: 5px;
    text-align: center;
}
.nav-justified > .dropdown .dropdown-menu {
    top: auto;
    left: auto;
}
@media (min-width: 768px) {
    .nav-justified > li {
        display: table-cell;
        width: 1%;
    }
    .nav-justified > li > a {
        margin-bottom: 0;
    }
}
.nav-tabs-justified {
    border-bottom: 0;
}
.nav-tabs-justified > li > a {
    margin-right: 0;
    border-radius: 4px;
}
.nav-tabs-justified > .active > a,
.nav-tabs-justified > .active > a:focus,
.nav-tabs-justified > .active > a:hover {
    border: 1px solid #ddd;
}
@media (min-width: 768px) {
    .nav-tabs-justified > li > a {
        border-bottom: 1px solid #ddd;
        border-radius: 4px 4px 0 0;
    }
    .nav-tabs-justified > .active > a,
    .nav-tabs-justified > .active > a:focus,
    .nav-tabs-justified > .active > a:hover {
        border-bottom-color: #fff;
    }
}
.tab-content > .tab-pane {
    display: none;
}
.tab-content > .active {
    display: block;
}
.nav-tabs .dropdown-menu {
    margin-top: -1px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
 
@media (min-width: 768px) {
    .navbar {
        border-radius: 4px;
    }
}
 
 
 
.navbar-static-top {
    z-index: 1000;
    border-width: 0 0 1px;
}
@media (min-width: 768px) {
    .navbar-static-top {
        border-radius: 0;
    }
}
 
 
.breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #f5f5f5;
    border-radius: 4px;
}
.breadcrumb > li {
    display: inline-block;
}
.breadcrumb > li + li:before {
    padding: 0 5px;
    color: #ccc;
    content: "/\00a0";
}
.breadcrumb > .active {
    color: #777;
}
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination > li {
    display: inline;
}
.pagination > li > a,
.pagination > li > span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover {
    z-index: 2;
    color: #23527c;
    background-color: #eee;
    border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.pagination > .disabled > a,
.pagination > .disabled > a:focus,
.pagination > .disabled > a:hover,
.pagination > .disabled > span,
.pagination > .disabled > span:focus,
.pagination > .disabled > span:hover {
    color: #777;
    cursor: not-allowed;
    background-color: #fff;
    border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
    border-top-left-radius: 6px;
    border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
    border-top-right-radius: 6px;
    border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
    padding: 5px 10px;
    font-size: 12px;
    line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
}
.pager {
    padding-left: 0;
    margin: 20px 0;
    text-align: center;
    list-style: none;
}
.pager li {
    display: inline;
}
.pager li > a,
.pager li > span {
    display: inline-block;
    padding: 5px 14px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
}
.pager li > a:focus,
.pager li > a:hover {
    text-decoration: none;
    background-color: #eee;
}
.pager .next > a,
.pager .next > span {
    float: right;
}
.pager .previous > a,
.pager .previous > span {
    float: left;
}
.pager .disabled > a,
.pager .disabled > a:focus,
.pager .disabled > a:hover,
.pager .disabled > span {
    color: #777;
    cursor: not-allowed;
    background-color: #fff;
}
.label {
    display: inline;
    padding: 0.2em 0.6em 0.3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
}
a.label:focus,
a.label:hover {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}
.label:empty {
    display: none;
}
.btn .label {
    position: relative;
    top: -1px;
}
.label-default {
    background-color: #777;
}
.label-default[href]:focus,
.label-default[href]:hover {
    background-color: #5e5e5e;
}
.label-primary {
    background-color: #337ab7;
}
.label-primary[href]:focus,
.label-primary[href]:hover {
    background-color: #286090;
}
.label-success {
    background-color: #5cb85c;
}
.label-success[href]:focus,
.label-success[href]:hover {
    background-color: #449d44;
}
.label-info {
    background-color: #5bc0de;
}
.label-info[href]:focus,
.label-info[href]:hover {
    background-color: #31b0d5;
}
.label-warning {
    background-color: #f0ad4e;
}
.label-warning[href]:focus,
.label-warning[href]:hover {
    background-color: #ec971f;
}
.label-danger {
    background-color: #d9534f;
}
.label-danger[href]:focus,
.label-danger[href]:hover {
    background-color: #c9302c;
}
.badge {
    display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #777;
    border-radius: 10px;
}
.badge:empty {
    display: none;
}
.btn .badge {
    position: relative;
    top: -1px;
}
.btn-group-xs > .btn .badge,
.btn-xs .badge {
    top: 0;
    padding: 1px 5px;
}
a.badge:focus,
a.badge:hover {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}
.list-group-item.active > .badge,
.nav-pills > .active > a > .badge {
    color: #337ab7;
    background-color: #fff;
}
.list-group-item > .badge {
    float: right;
}
.list-group-item > .badge + .badge {
    margin-right: 5px;
}
.nav-pills > li > a > .badge {
    margin-left: 3px;
}
.jumbotron {
    padding-top: 30px;
    padding-bottom: 30px;
    margin-bottom: 30px;
    color: inherit;
    background-color: #eee;
}
.jumbotron .h1,
.jumbotron h1 {
    color: inherit;
}
.jumbotron p {
    margin-bottom: 15px;
    font-size: 21px;
    font-weight: 200;
}
.jumbotron > hr {
    border-top-color: #d5d5d5;
}
.container .jumbotron,
.container-fluid .jumbotron {
    padding-right: 15px;
    padding-left: 15px;
    border-radius: 6px;
}
.jumbotron .container {
    max-width: 100%;
}
@media screen and (min-width: 768px) {
    .jumbotron {
        padding-top: 48px;
        padding-bottom: 48px;
    }
    .container .jumbotron,
    .container-fluid .jumbotron {
        padding-right: 60px;
        padding-left: 60px;
    }
    .jumbotron .h1,
    .jumbotron h1 {
        font-size: 63px;
    }
}
.thumbnail {
    display: block;
    padding: 4px;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: border 0.2s ease-in-out;
    -o-transition: border 0.2s ease-in-out;
    transition: border 0.2s ease-in-out;
}
.thumbnail a > img,
.thumbnail > img {
    margin-right: auto;
    margin-left: auto;
}
a.thumbnail.active,
a.thumbnail:focus,
a.thumbnail:hover {
    border-color: #337ab7;
}
.thumbnail .caption {
    padding: 9px;
    color: #333;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert h4 {
    margin-top: 0;
    color: inherit;
}
.alert .alert-link {
    font-weight: 700;
}
.alert > p,
.alert > ul {
    margin-bottom: 0;
}
.alert > p + p {
    margin-top: 5px;
}
.alert-dismissable,
.alert-dismissible {
    padding-right: 35px;
}
.alert-dismissable .close,
.alert-dismissible .close {
    position: relative;
    top: -2px;
    right: -21px;
    color: inherit;
}
.alert-success {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.alert-success hr {
    border-top-color: #c9e2b3;
}
.alert-success .alert-link {
    color: #2b542c;
}
.alert-info {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.alert-info hr {
    border-top-color: #a6e1ec;
}
.alert-info .alert-link {
    color: #245269;
}
.alert-warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
}
.alert-warning hr {
    border-top-color: #f7e1b5;
}
.alert-warning .alert-link {
    color: #66512c;
}
.alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert-danger hr {
    border-top-color: #e4b9c0;
}
.alert-danger .alert-link {
    color: #843534;
}
@-webkit-keyframes progress-bar-stripes {
    from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
}
@-o-keyframes progress-bar-stripes {
    from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
}
@keyframes progress-bar-stripes {
    from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
}
.progress {
    height: 20px;
    margin-bottom: 20px;
    overflow: hidden;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}
.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #337ab7;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
    box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.15);
    -webkit-transition: width 0.6s ease;
    -o-transition: width 0.6s ease;
    transition: width 0.6s ease;
}
.progress-bar-striped,
.progress-striped .progress-bar {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    -webkit-background-size: 40px 40px;
    background-size: 40px 40px;
}
.progress-bar.active,
.progress.active .progress-bar {
    -webkit-animation: progress-bar-stripes 2s linear infinite;
    -o-animation: progress-bar-stripes 2s linear infinite;
    animation: progress-bar-stripes 2s linear infinite;
}
.progress-bar-success {
    background-color: #5cb85c;
}
.progress-striped .progress-bar-success {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-info {
    background-color: #5bc0de;
}
.progress-striped .progress-bar-info {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-warning {
    background-color: #f0ad4e;
}
.progress-striped .progress-bar-warning {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.progress-bar-danger {
    background-color: #d9534f;
}
.progress-striped .progress-bar-danger {
    background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}
.media {
    margin-top: 15px;
}
.media:first-child {
    margin-top: 0;
}
.media,
.media-body {
    overflow: hidden;
    zoom: 1;
}
.media-body {
    width: 10000px;
}
.media-object {
    display: block;
}
.media-object.img-thumbnail {
    max-width: none;
}
.media-right,
.media > .pull-right {
    padding-left: 10px;
}
.media-left,
.media > .pull-left {
    padding-right: 10px;
}
.media-body,
.media-left,
.media-right {
    display: table-cell;
    vertical-align: top;
}
.media-middle {
    vertical-align: middle;
}
.media-bottom {
    vertical-align: bottom;
}
.media-heading {
    margin-top: 0;
    margin-bottom: 5px;
}
.media-list {
    padding-left: 0;
    list-style: none;
}
.list-group {
    padding-left: 0;
    margin-bottom: 20px;
}
.list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid #ddd;
}
.list-group-item:first-child {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}
.list-group-item:last-child {
    margin-bottom: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}
a.list-group-item,
button.list-group-item {
    color: #555;
}
a.list-group-item .list-group-item-heading,
button.list-group-item .list-group-item-heading {
    color: #333;
}
a.list-group-item:focus,
a.list-group-item:hover,
button.list-group-item:focus,
button.list-group-item:hover {
    color: #555;
    text-decoration: none;
    background-color: #f5f5f5;
}
button.list-group-item {
    width: 100%;
    text-align: left;
}
.list-group-item.disabled,
.list-group-item.disabled:focus,
.list-group-item.disabled:hover {
    color: #777;
    cursor: not-allowed;
    background-color: #eee;
}
.list-group-item.disabled .list-group-item-heading,
.list-group-item.disabled:focus .list-group-item-heading,
.list-group-item.disabled:hover .list-group-item-heading {
    color: inherit;
}
.list-group-item.disabled .list-group-item-text,
.list-group-item.disabled:focus .list-group-item-text,
.list-group-item.disabled:hover .list-group-item-text {
    color: #777;
}
.list-group-item.active,
.list-group-item.active:focus,
.list-group-item.active:hover {
    z-index: 2;
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.list-group-item.active .list-group-item-heading,
.list-group-item.active .list-group-item-heading > .small,
.list-group-item.active .list-group-item-heading > small,
.list-group-item.active:focus .list-group-item-heading,
.list-group-item.active:focus .list-group-item-heading > .small,
.list-group-item.active:focus .list-group-item-heading > small,
.list-group-item.active:hover .list-group-item-heading,
.list-group-item.active:hover .list-group-item-heading > .small,
.list-group-item.active:hover .list-group-item-heading > small {
    color: inherit;
}
.list-group-item.active .list-group-item-text,
.list-group-item.active:focus .list-group-item-text,
.list-group-item.active:hover .list-group-item-text {
    color: #c7ddef;
}
.list-group-item-success {
    color: #3c763d;
    background-color: #dff0d8;
}
a.list-group-item-success,
button.list-group-item-success {
    color: #3c763d;
}
a.list-group-item-success .list-group-item-heading,
button.list-group-item-success .list-group-item-heading {
    color: inherit;
}
a.list-group-item-success:focus,
a.list-group-item-success:hover,
button.list-group-item-success:focus,
button.list-group-item-success:hover {
    color: #3c763d;
    background-color: #d0e9c6;
}
a.list-group-item-success.active,
a.list-group-item-success.active:focus,
a.list-group-item-success.active:hover,
button.list-group-item-success.active,
button.list-group-item-success.active:focus,
button.list-group-item-success.active:hover {
    color: #fff;
    background-color: #3c763d;
    border-color: #3c763d;
}
.list-group-item-info {
    color: #31708f;
    background-color: #d9edf7;
}
a.list-group-item-info,
button.list-group-item-info {
    color: #31708f;
}
a.list-group-item-info .list-group-item-heading,
button.list-group-item-info .list-group-item-heading {
    color: inherit;
}
a.list-group-item-info:focus,
a.list-group-item-info:hover,
button.list-group-item-info:focus,
button.list-group-item-info:hover {
    color: #31708f;
    background-color: #c4e3f3;
}
a.list-group-item-info.active,
a.list-group-item-info.active:focus,
a.list-group-item-info.active:hover,
button.list-group-item-info.active,
button.list-group-item-info.active:focus,
button.list-group-item-info.active:hover {
    color: #fff;
    background-color: #31708f;
    border-color: #31708f;
}
.list-group-item-warning {
    color: #8a6d3b;
    background-color: #fcf8e3;
}
a.list-group-item-warning,
button.list-group-item-warning {
    color: #8a6d3b;
}
a.list-group-item-warning .list-group-item-heading,
button.list-group-item-warning .list-group-item-heading {
    color: inherit;
}
a.list-group-item-warning:focus,
a.list-group-item-warning:hover,
button.list-group-item-warning:focus,
button.list-group-item-warning:hover {
    color: #8a6d3b;
    background-color: #faf2cc;
}
a.list-group-item-warning.active,
a.list-group-item-warning.active:focus,
a.list-group-item-warning.active:hover,
button.list-group-item-warning.active,
button.list-group-item-warning.active:focus,
button.list-group-item-warning.active:hover {
    color: #fff;
    background-color: #8a6d3b;
    border-color: #8a6d3b;
}
.list-group-item-danger {
    color: #a94442;
    background-color: #f2dede;
}
a.list-group-item-danger,
button.list-group-item-danger {
    color: #a94442;
}
a.list-group-item-danger .list-group-item-heading,
button.list-group-item-danger .list-group-item-heading {
    color: inherit;
}
a.list-group-item-danger:focus,
a.list-group-item-danger:hover,
button.list-group-item-danger:focus,
button.list-group-item-danger:hover {
    color: #a94442;
    background-color: #ebcccc;
}
a.list-group-item-danger.active,
a.list-group-item-danger.active:focus,
a.list-group-item-danger.active:hover,
button.list-group-item-danger.active,
button.list-group-item-danger.active:focus,
button.list-group-item-danger.active:hover {
    color: #fff;
    background-color: #a94442;
    border-color: #a94442;
}
.list-group-item-heading {
    margin-top: 0;
    margin-bottom: 5px;
}
.list-group-item-text {
    margin-bottom: 0;
    line-height: 1.3;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.panel-body {
    padding: 15px;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-heading > .dropdown .dropdown-toggle {
    color: inherit;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.panel-title > .small,
.panel-title > .small > a,
.panel-title > a,
.panel-title > small,
.panel-title > small > a {
    color: inherit;
}
.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.panel > .list-group,
.panel > .panel-collapse > .list-group {
    margin-bottom: 0;
}
.panel > .list-group .list-group-item,
.panel > .panel-collapse > .list-group .list-group-item {
    border-width: 1px 0;
    border-radius: 0;
}
.panel > .list-group:first-child .list-group-item:first-child,
.panel > .panel-collapse > .list-group:first-child .list-group-item:first-child {
    border-top: 0;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel > .list-group:last-child .list-group-item:last-child,
.panel > .panel-collapse > .list-group:last-child .list-group-item:last-child {
    border-bottom: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
.panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.panel-heading + .list-group .list-group-item:first-child {
    border-top-width: 0;
}
.list-group + .panel-footer {
    border-top-width: 0;
}
 
.panel-group {
    margin-bottom: 20px;
}
.panel-group .panel {
    margin-bottom: 0;
    border-radius: 4px;
}
.panel-group .panel + .panel {
    margin-top: 5px;
}
.panel-group .panel-heading {
    border-bottom: 0;
}
.panel-group .panel-heading + .panel-collapse > .list-group,
.panel-group .panel-heading + .panel-collapse > .panel-body {
    border-top: 1px solid #ddd;
}
.panel-group .panel-footer {
    border-top: 0;
}
.panel-group .panel-footer + .panel-collapse .panel-body {
    border-bottom: 1px solid #ddd;
}
.panel-default {
    border-color: #ddd;
}
.panel-default > .panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-default > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #ddd;
}
.panel-default > .panel-heading .badge {
    color: #f5f5f5;
    background-color: #333;
}
.panel-default > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #ddd;
}
.panel-primary {
    border-color: #337ab7;
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.panel-primary > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #337ab7;
}
.panel-primary > .panel-heading .badge {
    color: #337ab7;
    background-color: #fff;
}
.panel-primary > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #337ab7;
}
.panel-success {
    border-color: #d6e9c6;
}
.panel-success > .panel-heading {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.panel-success > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #d6e9c6;
}
.panel-success > .panel-heading .badge {
    color: #dff0d8;
    background-color: #3c763d;
}
.panel-success > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #d6e9c6;
}
.panel-info {
    border-color: #bce8f1;
}
.panel-info > .panel-heading {
    color: #31708f;
    background-color: #d9edf7;
    border-color: #bce8f1;
}
.panel-info > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #bce8f1;
}
.panel-info > .panel-heading .badge {
    color: #d9edf7;
    background-color: #31708f;
}
.panel-info > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #bce8f1;
}
.panel-warning {
    border-color: #faebcc;
}
.panel-warning > .panel-heading {
    color: #8a6d3b;
    background-color: #fcf8e3;
    border-color: #faebcc;
}
.panel-warning > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #faebcc;
}
.panel-warning > .panel-heading .badge {
    color: #fcf8e3;
    background-color: #8a6d3b;
}
.panel-warning > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #faebcc;
}
.panel-danger {
    border-color: #ebccd1;
}
.panel-danger > .panel-heading {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.panel-danger > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #ebccd1;
}
.panel-danger > .panel-heading .badge {
    color: #f2dede;
    background-color: #a94442;
}
.panel-danger > .panel-footer + .panel-collapse > .panel-body {
    border-bottom-color: #ebccd1;
}
.embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden;
}
.embed-responsive .embed-responsive-item,
.embed-responsive embed,
.embed-responsive iframe,
.embed-responsive object,
.embed-responsive video {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
.embed-responsive-16by9 {
    padding-bottom: 56.25%;
}
.embed-responsive-4by3 {
    padding-bottom: 75%;
}
.well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
.well blockquote {
    border-color: #ddd;
    border-color: rgba(0, 0, 0, 0.15);
}
.well-lg {
    padding: 24px;
    border-radius: 6px;
}
.well-sm {
    padding: 9px;
    border-radius: 3px;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 0.2;
}
.close:focus,
.close:hover {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    filter: alpha(opacity=50);
    opacity: 0.5;
}
button.close {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: 0 0;
    border: 0;
}
.modal-open {
    overflow: hidden;
}
.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.modal.fade .modal-dialog {
    -webkit-transition: -webkit-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    -webkit-transform: translate(0, -25%);
    -ms-transform: translate(0, -25%);
    -o-transform: translate(0, -25%);
    transform: translate(0, -25%);
}
.modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
}
.modal-content {
    position: relative;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
.modal-backdrop.fade {
    filter: alpha(opacity=0);
    opacity: 0;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: 0.5;
}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
    margin-top: -2px;
}
.modal-title {
    margin: 0;
    line-height: 1.42857143;
}
.modal-body {
    position: relative;
    padding: 15px;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.modal-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}
.modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
}
@media (min-width: 768px) {
    .modal-dialog {
        width: 600px;
        margin: 30px auto;
    }
    .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }
    .modal-sm {
        width: 300px;
    }
}
@media (min-width: 992px) {
    .modal-lg {
        width: 900px;
    }
}
.tooltip {
    position: absolute;
    z-index: 1070;
    display: block;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: left;
    text-align: start;
    text-decoration: none;
    text-shadow: none;
    text-transform: none;
    letter-spacing: normal;
    word-break: normal;
    word-spacing: normal;
    word-wrap: normal;
    white-space: normal;
    filter: alpha(opacity=0);
    opacity: 0;
    line-break: auto;
}
.tooltip.in {
    filter: alpha(opacity=90);
    opacity: 0.9;
}
.tooltip.top {
    padding: 5px 0;
    margin-top: -3px;
}
.tooltip.right {
    padding: 0 5px;
    margin-left: 3px;
}
.tooltip.bottom {
    padding: 5px 0;
    margin-top: 3px;
}
.tooltip.left {
    padding: 0 5px;
    margin-left: -3px;
}
.tooltip-inner {
    max-width: 200px;
    padding: 3px 8px;
    color: #fff;
    text-align: center;
    background-color: #000;
    border-radius: 4px;
}
.tooltip-arrow {
    position: absolute;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
}
.tooltip.top .tooltip-arrow {
    bottom: 0;
    left: 50%;
    margin-left: -5px;
    border-width: 5px 5px 0;
    border-top-color: #000;
}
.tooltip.top-left .tooltip-arrow {
    right: 5px;
    bottom: 0;
    margin-bottom: -5px;
    border-width: 5px 5px 0;
    border-top-color: #000;
}
.tooltip.top-right .tooltip-arrow {
    bottom: 0;
    left: 5px;
    margin-bottom: -5px;
    border-width: 5px 5px 0;
    border-top-color: #000;
}
.tooltip.right .tooltip-arrow {
    top: 50%;
    left: 0;
    margin-top: -5px;
    border-width: 5px 5px 5px 0;
    border-right-color: #000;
}
.tooltip.left .tooltip-arrow {
    top: 50%;
    right: 0;
    margin-top: -5px;
    border-width: 5px 0 5px 5px;
    border-left-color: #000;
}
.tooltip.bottom .tooltip-arrow {
    top: 0;
    left: 50%;
    margin-left: -5px;
    border-width: 0 5px 5px;
    border-bottom-color: #000;
}
.tooltip.bottom-left .tooltip-arrow {
    top: 0;
    right: 5px;
    margin-top: -5px;
    border-width: 0 5px 5px;
    border-bottom-color: #000;
}
.tooltip.bottom-right .tooltip-arrow {
    top: 0;
    left: 5px;
    margin-top: -5px;
    border-width: 0 5px 5px;
    border-bottom-color: #000;
}
.popover {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1060;
    display: none;
    max-width: 276px;
    padding: 1px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: left;
    text-align: start;
    text-decoration: none;
    text-shadow: none;
    text-transform: none;
    letter-spacing: normal;
    word-break: normal;
    word-spacing: normal;
    word-wrap: normal;
    white-space: normal;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    line-break: auto;
}
.popover.top {
    margin-top: -10px;
}
.popover.right {
    margin-left: 10px;
}
.popover.bottom {
    margin-top: 10px;
}
.popover.left {
    margin-left: -10px;
}
.popover-title {
    padding: 8px 14px;
    margin: 0;
    font-size: 14px;
    background-color: #f7f7f7;
    border-bottom: 1px solid #ebebeb;
    border-radius: 5px 5px 0 0;
}
.popover-content {
    padding: 9px 14px;
}
.popover > .arrow,
.popover > .arrow:after {
    position: absolute;
    display: block;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
}
.popover > .arrow {
    border-width: 11px;
}
.popover > .arrow:after {
    content: "";
    border-width: 10px;
}
.popover.top > .arrow {
    bottom: -11px;
    left: 50%;
    margin-left: -11px;
    border-top-color: #999;
    border-top-color: rgba(0, 0, 0, 0.25);
    border-bottom-width: 0;
}
.popover.top > .arrow:after {
    bottom: 1px;
    margin-left: -10px;
    content: " ";
    border-top-color: #fff;
    border-bottom-width: 0;
}
.popover.right > .arrow {
    top: 50%;
    left: -11px;
    margin-top: -11px;
    border-right-color: #999;
    border-right-color: rgba(0, 0, 0, 0.25);
    border-left-width: 0;
}
.popover.right > .arrow:after {
    bottom: -10px;
    left: 1px;
    content: " ";
    border-right-color: #fff;
    border-left-width: 0;
}
.popover.bottom > .arrow {
    top: -11px;
    left: 50%;
    margin-left: -11px;
    border-top-width: 0;
    border-bottom-color: #999;
    border-bottom-color: rgba(0, 0, 0, 0.25);
}
.popover.bottom > .arrow:after {
    top: 1px;
    margin-left: -10px;
    content: " ";
    border-top-width: 0;
    border-bottom-color: #fff;
}
.popover.left > .arrow {
    top: 50%;
    right: -11px;
    margin-top: -11px;
    border-right-width: 0;
    border-left-color: #999;
    border-left-color: rgba(0, 0, 0, 0.25);
}
.popover.left > .arrow:after {
    right: 1px;
    bottom: -10px;
    content: " ";
    border-right-width: 0;
    border-left-color: #fff;
}
.carousel {
    position: relative;
}
.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
}
.carousel-inner > .item {
    position: relative;
    display: none;
    -webkit-transition: 0.6s ease-in-out left;
    -o-transition: 0.6s ease-in-out left;
    transition: 0.6s ease-in-out left;
}
.carousel-inner > .item > a > img,
.carousel-inner > .item > img {
    line-height: 1;
}
@media all and (transform-3d), (-webkit-transform-3d) {
    .carousel-inner > .item {
        -webkit-transition: -webkit-transform 0.6s ease-in-out;
        -o-transition: -o-transform 0.6s ease-in-out;
        transition: transform 0.6s ease-in-out;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-perspective: 1000px;
        perspective: 1000px;
    }
    .carousel-inner > .item.active.right,
    .carousel-inner > .item.next {
        left: 0;
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
    }
    .carousel-inner > .item.active.left,
    .carousel-inner > .item.prev {
        left: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0);
    }
    .carousel-inner > .item.active,
    .carousel-inner > .item.next.left,
    .carousel-inner > .item.prev.right {
        left: 0;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
}
.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
    display: block;
}
.carousel-inner > .active {
    left: 0;
}
.carousel-inner > .next,
.carousel-inner > .prev {
    position: absolute;
    top: 0;
    width: 100%;
}
.carousel-inner > .next {
    left: 100%;
}
.carousel-inner > .prev {
    left: -100%;
}
.carousel-inner > .next.left,
.carousel-inner > .prev.right {
    left: 0;
}
.carousel-inner > .active.left {
    left: -100%;
}
.carousel-inner > .active.right {
    left: 100%;
}
.carousel-control {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 15%;
    font-size: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
    background-color: rgba(0, 0, 0, 0);
    filter: alpha(opacity=50);
    opacity: 0.5;
}
.carousel-control.left {
    background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
    background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
    background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0.0001)));
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0.0001) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
    background-repeat: repeat-x;
}
.carousel-control.right {
    right: 0;
    left: auto;
    background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
    background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
    background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, 0.0001)), to(rgba(0, 0, 0, 0.5)));
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.0001) 0, rgba(0, 0, 0, 0.5) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
    background-repeat: repeat-x;
}
.carousel-control:focus,
.carousel-control:hover {
    color: #fff;
    text-decoration: none;
    filter: alpha(opacity=90);
    outline: 0;
    opacity: 0.9;
}
.carousel-control .glyphicon-chevron-left,
.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next,
.carousel-control .icon-prev {
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
    margin-top: -10px;
}
.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
    left: 50%;
    margin-left: -10px;
}
.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
    right: 50%;
    margin-right: -10px;
}
.carousel-control .icon-next,
.carousel-control .icon-prev {
    width: 20px;
    height: 20px;
    font-family: serif;
    line-height: 1;
}
.carousel-control .icon-prev:before {
    content: "\2039";
}
.carousel-control .icon-next:before {
    content: "\203a";
}
.carousel-indicators {
    position: absolute;
    bottom: 10px;
    left: 50%;
    z-index: 15;
    width: 60%;
    padding-left: 0;
    margin-left: -30%;
    text-align: center;
    list-style: none;
}
.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #000\9;
    background-color: rgba(0, 0, 0, 0);
    border: 1px solid #fff;
    border-radius: 10px;
}
.carousel-indicators .active {
    width: 12px;
    height: 12px;
    margin: 0;
    background-color: #fff;
}
.carousel-caption {
    position: absolute;
    right: 15%;
    bottom: 20px;
    left: 15%;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
}
.carousel-caption .btn {
    text-shadow: none;
}
@media screen and (min-width: 768px) {
    .carousel-control .glyphicon-chevron-left,
    .carousel-control .glyphicon-chevron-right,
    .carousel-control .icon-next,
    .carousel-control .icon-prev {
        width: 30px;
        height: 30px;
        margin-top: -10px;
        font-size: 30px;
    }
    .carousel-control .glyphicon-chevron-left,
    .carousel-control .icon-prev {
        margin-left: -10px;
    }
    .carousel-control .glyphicon-chevron-right,
    .carousel-control .icon-next {
        margin-right: -10px;
    }
    .carousel-caption {
        right: 20%;
        left: 20%;
        padding-bottom: 30px;
    }
    .carousel-indicators {
        bottom: 20px;
    }
}
.btn-group-vertical > .btn-group:after,
.btn-group-vertical > .btn-group:before,
.btn-toolbar:after,
.btn-toolbar:before,
.clearfix:after,
.clearfix:before,
.container-fluid:after,
.container-fluid:before,
.container:after,
.container:before,
.dl-horizontal dd:after,
.dl-horizontal dd:before,
.form-horizontal .form-group:after,
.form-horizontal .form-group:before,
.modal-footer:after,
.modal-footer:before,
.modal-header:after,
.modal-header:before,
.nav:after,
.nav:before,
.navbar-collapse:after,
.navbar-collapse:before,
.navbar-header:after,
.navbar-header:before,
.navbar:after,
.navbar:before,
.pager:after,
.pager:before,
.panel-body:after,
.panel-body:before,
.row:after,
.row:before {
    display: table;
    content: " ";
}
.btn-group-vertical > .btn-group:after,
.btn-toolbar:after,
.clearfix:after,
.container-fluid:after,
.container:after,
.dl-horizontal dd:after,
.form-horizontal .form-group:after,
.modal-footer:after,
.modal-header:after,
.nav:after,
.navbar-collapse:after,
.navbar-header:after,
.navbar:after,
.pager:after,
.panel-body:after,
.row:after {
    clear: both;
}
.center-block {
    display: block;
    margin-right: auto;
    margin-left: auto;
}
.pull-right {
    float: right !important;
}
.pull-left {
    float: left !important;
}
.hide {
    display: none !important;
}
.show {
    display: block !important;
}
.invisible {
    visibility: hidden;
}
.text-hide {
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;
}
.hidden {
    display: none !important;
}
.affix {
    position: fixed;
}
@-ms-viewport {
    width: device-width;
}
.visible-lg,
.visible-md,
.visible-sm,
.visible-xs {
    display: none !important;
}
.visible-lg-block,
.visible-lg-inline,
.visible-lg-inline-block,
.visible-md-block,
.visible-md-inline,
.visible-md-inline-block,
.visible-sm-block,
.visible-sm-inline,
.visible-sm-inline-block,
.visible-xs-block,
.visible-xs-inline,
.visible-xs-inline-block {
    display: none !important;
}
 
@media (max-width: 767px) {
    .visible-xs-block {
        display: block !important;
    }
}
@media (max-width: 767px) {
    .visible-xs-inline {
        display: inline !important;
    }
}
@media (max-width: 767px) {
    .visible-xs-inline-block {
        display: inline-block !important;
    }
}
 
@media (min-width: 768px) and (max-width: 991px) {
    .visible-sm-block {
        display: block !important;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
    .visible-sm-inline {
        display: inline !important;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
    .visible-sm-inline-block {
        display: inline-block !important;
    }
}
 
@media (min-width: 992px) and (max-width: 1199px) {
    .visible-md-block {
        display: block !important;
    }
}
@media (min-width: 992px) and (max-width: 1199px) {
    .visible-md-inline {
        display: inline !important;
    }
}
@media (min-width: 992px) and (max-width: 1199px) {
    .visible-md-inline-block {
        display: inline-block !important;
    }
}
 
@media (min-width: 1200px) {
    .visible-lg-block {
        display: block !important;
    }
}
@media (min-width: 1200px) {
    .visible-lg-inline {
        display: inline !important;
    }
}
@media (min-width: 1200px) {
    .visible-lg-inline-block {
        display: inline-block !important;
    }
}
@media (max-width: 767px) {
    .hidden-xs {
        display: none !important;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
    .hidden-sm {
        display: none !important;
    }
}
@media (min-width: 992px) and (max-width: 1199px) {
    .hidden-md {
        display: none !important;
    }
}
@media (min-width: 1200px) {
    .hidden-lg {
        display: none !important;
    }
}
.visible-print {
    display: none !important;
}
 
.visible-print-block {
    display: none !important;
}
@media print {
    .visible-print-block {
        display: block !important;
    }
}
.visible-print-inline {
    display: none !important;
}
@media print {
    .visible-print-inline {
        display: inline !important;
    }
}
.visible-print-inline-block {
    display: none !important;
}
@media print {
    .visible-print-inline-block {
        display: inline-block !important;
    }
}
@media print {
    .hidden-print {
        display: none !important;
    }
}
/*# sourceMappingURL=bootstrap.min.css.map */

.card {
     
    padding: 10px;
}

 </style>
 
<section class="users-list-wrapper">
  
  <div class="users-list-table">
    <div class="card">
      <div class="form-group" style="display: none">
      <label for="ShowWeekends">Calendar Weekends</label>
      <div class="input-group">
      <input class='showHideWeekend' type="checkbox" checked>
      </div>
      </div>


      <div class="panel panel-default hidden-print">
  <div class="panel-heading">
    <h3 class="panel-title">Search Type</h3>
  </div>
  <div class="panel-body">
    
    <div class="col-lg-4">
  
  <label for="calendar_view">Filter Trainer</label>
  <div class="input-group">
      <select class="filter" id="type_filter" multiple="multiple" style="width: 100%">
        @foreach($trainsers as $trainer)
        <option value="{{$trainer->name}}">{{$trainer->name}}</option>
        @endforeach
         
      </select>
    </div>
</div>
    
    <div class="col-lg-4 hide" style="display: none">
  
  <label for="calendar_view">Filter Calendars</label>
  <div class="input-group">
      <select class="filter" id="calendar_filter" multiple="multiple">
        <option value="Sales">Sales</option>
        <option value="Lettings">Lettings</option>
      </select>
    </div>
</div>
    
    <div class="col-lg-4 hide" style="display: none">
  
  <label for="calendar_view">Filter Users</label>
  <div class="input-group" style="display: none">
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Caio Vitorelli" checked>Caio Vitorelli</label>
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Peter Grant" checked>Peter Grant</label>
      <label class="checkbox-inline"><input class='filter' type="checkbox" value="Adam Rackham" checked>Adam Rackham</label>
  </div>
</div>
    
  </div>
</div>


    <div id="wrapper">
      <div id="loading"></div>
      <div class="print-visible" id="calendar"></div>
    </div>
      <!-- ADD EVENT MODAL -->
      
      <div class="modal fade" tabindex="-1" role="dialog" id="newEventModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Create new <span class="eventType"></span></h4>
            </div>
            <div class="modal-body">
              
              <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">All Day Event ?</label>
                        <input class='allDayNewEvent' type="checkbox"></label>
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">Event title</label>
                        <input class="inputModal" type="text" name="title" id="title" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="starts-at">Starts at</label>
                        <input class="inputModal" type="text" name="starts_at" id="starts-at" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="ends-at">Ends at</label>
                        <input class="inputModal" type="text" name="ends_at" id="ends-at" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="calendar-type">Calendar</label>
                        <select class="inputModal" type="text" name="calendar-type" id="calendar-type">
                          <option value="Sales">Sales</option>
                          <option value="Lettings">Lettings</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="add-event-desc">Description</label>
                        <textarea rows="4" cols="50" class="inputModal" name="add-event-desc" id="add-event-desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-event">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
      
      
      <!-- EDIT EVENT MODAL -->
      
      <div class="modal fade" tabindex="-1" role="dialog" id="editEventModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Edit <span class="eventName"></span></h4>
            </div>
            <div class="modal-body">
              
                
          
          <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">All Day Event ?</label>
                        <input class='allDayEdit' type="checkbox"></label>
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="title">Event title</label>
                        <input class="inputModal" type="text" name="editTitle" id="editTitle" />
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="starts-at">Starts at</label>
                        <input class="inputModal" type="text" name="editStartDate" id="editStartDate" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="ends-at">Ends at</label>
                        <input class="inputModal" type="text" name="editEndDate" id="editEndDate" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="edit-calendar-type">Calendar</label>
                        <select class="inputModal" type="text" name="edit-calendar-type" id="edit-calendar-type">
                          <option value="Sales">Sales</option>
                          <option value="Lettings">Lettings</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label class="col-xs-4" for="edit-event-desc">Description</label>
                        <textarea rows="4" cols="50" class="inputModal" name="edit-event-desc" id="edit-event-desc"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="deleteEvent">Delete Event</button>
                <button type="button" class="btn btn-primary" id="updateEvent">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

     
      <div class="card-body">
      <form action="{{url('/app/training')}}" id="form2" method="post" style="display: none">
        @csrf
           <div class="form>">
                          <!-- <div class="form-group" style="float: left;">
                            <label>Status</label>
                            <select class="form-control status" id="invoice" style="width:106px">
                            <option value="">--Select--</option>
                               
                              <option value="0">Active</option>
                              <option value="1">Renew</option>
                              <option value="2">Agree</option>
                              <option value="3">Cancel</option>
                            </select>
                          </div> -->

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Product</label>
                            <select class="form-control status" id="customer" style="" name="product">
                            <option value="">--Select--</option>
                              @foreach($product as $pro)
                              <option value="{{$pro->description}}" @if($_REQUEST['product']==$pro->description) {{'selected'}} @endif>{{$pro->description}}</option>
                              @endforeach
                              
                            </select>
                          </div>
                          <div class="form-group" style="float: left;width:112px;margin-left: 10px">
                            <label>Session</label>
                            <select class="form-control status" id="type" style="" name="session">
                            <option value="">--Select--</option>
                              <option value="none" @if($_REQUEST['session']=='none') {{'selected'}} @endif>None</option>
                              <option value="1" @if($_REQUEST['session']==1) {{'selected'}} @endif>Session 1</option>
                              <option value="1_2" @if($_REQUEST['session']=='1_2') {{'selected'}} @endif>Session 1-2</option>
                              <option value="2" @if($_REQUEST['session']==2) {{'selected'}} @endif>Session 2</option>
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Trainer</label>
                            <select class="form-control status" id="customer" style="" name="trainer">
                             <option value="">--Select--</option>
                             @foreach($trainers as $trainer)
                             <option value="{{$trainer->id}}" @if($_REQUEST['trainer']==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>

                            @endforeach
                              
                            </select>
                          </div>

                          <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="">--Select--</option>
                              <option value="1" @if($_REQUEST['status']==1) {{'selected'}} @endif>Online</option>
                              <option value="2" @if($_REQUEST['status']==2) {{'selected'}} @endif>Onsite</option>
                            </select>
                          </div>


                          <!-- <div class="form-group" style="float: left;width:106px;margin-left: 10px">
                            <label>Value</label>
                            <select class="form-control status" id="value" style="width:106px">
                            <option value="">--Select--</option>
                              
                              <option value="999">< 999</option>
                              <option value="1000-1999">1000-1999</option>
                              <option value="2000-2999">2000-2999</option>
                              <option value="3000-3999">3000-3999</option>
                              <option value="4000">> 4000</option>
                               
                            </select>
                          </div> -->
 

                           <div class="form-group" style="float: left;width:125px;margin-left: 10px">
                            <label>From</label>
                             <input type="text" class="form-control" id="startDate" name="startDate" value="{{$_REQUEST['startDate']}}">
                             
                          </div>
                          <div class="form-group"  style="float: left;width:125px;margin-left: 10px">
                            <label>To</label>
                            <input type="text" id="endDate" value="{{$_REQUEST['endDate']}}" class="form-control" name="endDate">
                             
                             
                          </div> 

                          <div class="form-group jj">
                          <label></label>
                          <button type="submit" class="btn btn-success submit" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-search-alt-2"></i></button>
                          <a href="{{url('/app/training')}}" class="btn btn-warning" style="    margin-top: 23px;padding: 6px;"><i class="bx bx-reset"></i></a>
                          </div>
                        </div>
        </form>
      @if (count($errors) > 0)
            <div class="alert alert-success">
                
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="empTable" class="table">
            <thead>
              <tr>
                 
                
                <th >Trainer</th>
                <th style="width: 232px;">Customer</th>
                <th >Session</th>
                <th >Product</th>
                <th>date</th>
                <th >Start Time</th>
                <th >End Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($schedules as $key => $value) {
       // echo '<pre>'; print_r($value);

        $trainerName= App\Models\Trainer::where('id',$value->trainerId)->first()
        ?>
         
          

              <tr>
                 
                <td>{{$trainerName->name}}</td>
                <td>{{$value->customerName}}</td>
                <td>{{$value->sessionId}}</td>
                <td>{{$value->product}}</td>
                <td>{{date('d-m-Y',strtotime($value->date))}}</td>
                <td>{{$value->startTime}}</td>
                <td>{{$value->endTime}}</td>
                
                 
                
                <td>

                


                 <?php $module='training_edit'; ?>
                 @if(in_array($module,Helper::checkPermission()))
                <!-- <a href="{{asset('app/training/edit')}}/{{$value->id}}" style="float: left !important;"><i class="bx bx-edit-alt" style="float: left !important;"></i></a> -->
                 @endif
                <?php $module='schedule_delete'; ?>
                @if(in_array($module,Helper::checkPermission()))
                <a href="{{asset('app/scheduling/delete')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete this?')"><i class="bx bx-trash-alt"></i></a>
                  
                @endif
                </td>
              </tr>
              <?php  }   ?> 
               
               
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
</section>
<!-- users list ends -->


<!-- Model Code -->
<!-- Button to Open the Modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_99_2">
  Open modal
</button> -->
<?php //echo '<pre>';print_r($ids); ?>
@foreach($ids as $key=>$edit)

<?php
$url= asset('app/sessionView').'/'.$edit['trainingId'].'/'.$edit['sessionId'];
$dis='disabled';
?>
<!-- The Modal -->
<div class="modal" id="myModal_{{$edit['trainingId'].$edit['sessionId']}}">
  <div class="modal-dialog">
    <div class="modal-content">

       <section class="users-edit">
  <div class="card" style="margin: 0;">
    <div class="card-body">
      


        
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="<?=$url?>" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">View Session</span>

        </a>

        </li>
        <li class="nav-item">
        <!-- <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
            href="#information" aria-controls="information" role="tab" aria-selected="false">
          <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
        </a> -->
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
             
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form class="form-validate" action="{{url('/app/updatesession/')}}/{{$id}}/{{$sId}}" method="post">
                
                @csrf
                <div class="row">
                  <div class="col-12 col-sm-6">
                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Number</label>
                            <input type="text" class="form-control" placeholder="Organization Number" name="customer" required="" value="{{$edit['customerId']}}" <?=$dis?>>

                             
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Organization Name</label>
                            <input type="text" class="form-control" placeholder="Organization Name" name="customer_name" required="" value="{{$edit['customerName']}}" <?=$dis?>>

                             
                        </div>
                      </div>

                       
                      <div class="form-group">
                        <div class="controls">
                            <label>Trainer</label>
                           <select class="form-control" name="trainerId" <?=$dis?>>
                           @foreach($trainers as $trainer)
                             <option value="{{$trainer->id}}" @if($edit['trainerId']==$trainer->id) {{'selected'}} @endif>{{$trainer->name}}</option>

                          @endforeach
                           </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Product</label>
                            <input type="text" class="form-control" placeholder="Product" name="Product" required="" value="{{$edit['product']}}" <?=$dis?>>

                             
                        </div>
                      </div>
                      
                       
                      
                       
                      
                  </div>
                  <div class="col-12 col-sm-6">

                  


                    <div class="form-group">
                        <div class="controls">
                            <label>Choose Date</label>
                            <input type="text" name="datetimes"  class="form-control" id="datepicker" value="{{date('d-m-Y',strtotime($edit['date']))}}" <?=$dis?>/>
                        </div>
                      </div>
                      <div class="col-sm-6" style="float: left;margin-left: -14px;">
                      <div class="form-group">
                        <div class="controls">
                            <label>Start Time</label>
                            <input type="text" name="startTime"  class="form-control" id="start" value="{{date('G:i a',strtotime($edit['startTime']))}}" <?=$dis?>/>
                        </div>
                      </div>
                      </div>
                      <div class="col-sm-6" style="float: left;">
                      <div class="form-group">
                        <div class="controls">
                            <label>End Time</label>
                            <input type="text" name="endTime"  class="form-control" id="end" value="{{date('G:i a',strtotime($edit['endTime']))}}"<?=$dis?> />
                        </div>
                      </div>

                      </div>

                      <div class="form-group">
                        <div class="controls">
                            <label>Status</label>
                            <select class="form-control" name="status">
                              <option value="1" @if($edit['status']==1) {{'selected'}} @endif>Online</option>
                              <option value="2" @if($edit['status']==2) {{'selected'}} @endif>Onsite</option>
                            </select>
                        </div>
                      </div>
                      
                    <div class="form-group">
                        <div class="controls">
                            <label>Remark</label>
                            <textarea class="form-control" <?=$dis?> name="remark" placeholder="Remark">{{$edit['remark']}}</textarea>

                             
                        </div>
                      </div>

                    
                    <a href="<?=$url?>">Edit</a>
                    <!-- Modal footer -->
      
        
                   <button type="button" style="float: right;" class="btn btn-danger" rel="{{$edit['trainingId'].$edit['sessionId']}}" data-dismiss="modal">Close</button>

                  </div>
                 
                  
                 
                </div>
            </form>
            <!-- users edit account form ends -->
        </div>
         
      </div>
    </div>
  </div>
</section>

      

    </div>
  </div>
</div>
<!-- Model Code -->
@endforeach






<?php
$purchased= $currentYear;

// Second array for sold product 
$sold= $lastYear; 

?>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
 
@endsection

{{-- page scripts --}}
@section('page-scripts')
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" type="text/javascript"></script>

 


<!--  -->
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCit4RJVPT9UiLQCJJPYEBkNTJCslqO4ps&libraries=places"></script>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css">
 

<!--  -->

<script type="text/javascript">
  $('#empTable').DataTable({ 
      // "aaSorting": [[ 6, "asc" ]] 
       order: [
                [6, 'asc']
            ],
    });

  function myOverFunction(id){
    $('#myModal_'+id).show();
  }


  $(function () {

          // $( ".test000" ).hover(function() {
          //   var id= $(this).attr('data');
          //   alert(id);
          //  $('#myModal_'+id).show();
          // });

          $('.btn-danger').click(function(){
            var id= $(this).attr('rel');
           $('#myModal_'+id).hide();
          });


            // $("#startDate").datepicker({
            //     maxDate: 0,
            //     onClose: function (selectedDate) {
            //         $("#endDate").datepicker("option", "minDate", selectedDate);
            //     }
            // });
            // $("#endDate").datepicker({
            //     maxDate: 0,
            //     onClose: function (selectedDate) {
            //         $("#startDate").datepicker("option", "maxDate", selectedDate);
            //     }
            // });
            var startDate;
            var endDate;
             $( "#startDate" ).datepicker({
            dateFormat: 'dd-mm-yy'
            })
            ///////
            ///////
             $( "#endDate" ).datepicker({
            dateFormat: 'dd-mm-yy'
            });
            ///////
            $('#startDate').change(function() {
            startDate = $(this).datepicker('getDate');
            $("#endDate").datepicker("option", "minDate", startDate );
            })

          $('.typeww').change(function(){
          $('#form2').submit();
          });
          $('.typeww1').change(function(){
          $('#form2').submit();
          });
           $('.form3').change(function(){
          $('#form3').submit();
          });
      });



  // Column Chart
  // ----------------------------------
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart4);

      function drawChart4() {
    
      var data = google.visualization.arrayToDataTable([
       ['Task', 'Hours per Day'],
       <?php foreach ($arrayChart as $key => $value) { ?>
         
       ['<?=$value['name']?>', <?=$value['sum']?>],
        
        <?php } ?>
        
     ]);
   
     var options = {
      // title: 'Users',         
        pieHole: 0.55,
         legend: 'none',
        //legend:{position: 'bottom'},
        
        width:'100%',
       // height:390,

       
       pieSliceTextStyle:{
         fontSize:10
       },
       
       chartArea:{left:15,top:0,width:'100%',height:'100%'},                  
     slices: {0:{color: '#ed5565'}, 1:{color: '#f8ac59'}, 2: {color: '#23c6c8'}}
     };
   
     var chart = new google.visualization.PieChart(document.getElementById('chart3'));
     chart.draw(data, options);
   }





 var $primary = '#5A8DEE',
            $success = '#39DA8A',
            $danger = '#FF5B5C',
            $warning = '#FDAC41',
            $info = '#39DA8A',
            $label_color_light = '#39DA8A';

            var themeColors = [$primary, $info, $danger, $success, '#39DA8A'];


  var columnChartOptions = {
    chart: {
      height: 350,
      type: 'bar',
    },
    colors: themeColors,
    plotOptions: {
      bar: {
        horizontal: false,
        endingShape: 'rounded',
        columnWidth: '55%',
      },
    },
    dataLabels: {
      enabled: false
    },
    stroke: {
      show: true,
      width: 2,
      colors: ['transparent']
    },
    series: [{
      name: 'Last Year',
      /// color:'#39DA8A',
      data: [<?=$sold[0]?>,<?=$sold[1]?>,<?=$sold[2]?>,<?=$sold[3]?>,<?=$sold[4]?>,<?=$sold[5]?>,<?=$sold[6]?>,<?=$sold[7]?>,<?=$sold[8]?>,<?=$sold[9]?>,<?=$sold[10]?>,<?=$sold[11]?>]
    }, {
      name: 'Current Year',
      color:'#007F64',
      data: [<?=$purchased[0]?>,<?=$purchased[1]?>,<?=$purchased[2]?>,<?=$purchased[3]?>,<?=$purchased[4]?>,<?=$purchased[5]?>,<?=$purchased[6]?>,<?=$purchased[7]?>,<?=$purchased[8]?>,<?=$purchased[9]?>,<?=$purchased[10]?>,<?=$purchased[11]?>]
    }],
    legend: {
      offsetY: 8
    },
    xaxis: {
      categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
    },
    yaxis: {
      title: {
        text: ''
      }
    },
    fill: {
      opacity: 1

    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "" + val + ""
        }
      }
    }
  }
  var columnChart = new ApexCharts(
    document.querySelector("#column-chart"),
    columnChartOptions
  );

  columnChart.render();
      


</script>

<script type="text/javascript">
  var newEvent;
var editEvent;

$(document).ready(function() {
    
   var calendar = $('#calendar').fullCalendar({
       
       eventRender: function(event, element, view) {
         
         var startTimeEventInfo = moment(event.start).format('HH:mm');
         var endTimeEventInfo = moment(event.end).format('HH:mm');
         var displayEventDate;
         
         if(event.avatar.length > 1){
           
           element.find(".fc-content").css('padding-left','45px');
           element.find(".fc-content").after($("<div class=\"fc-avatar-image\"></div>").html(event.description));
           element.find(".fc-content").after($("<div class=\"fc-avatar-image\"></div>").html(event.title));
           
         }
         
         if(event.allDay == false){
           displayEventDate = startTimeEventInfo + " - " + endTimeEventInfo;
         }else{
           displayEventDate = "All Day";
         }
         
          element.popover({
            title:    '<div class="popoverTitleCalendar" style="background-color:'+ event.backgroundColor +'; color:'+ event.textColor +'">'+ event.title +'</div>',
            content:  '<div class="popoverInfoCalendar">' +
                      '<p><strong>Session:</strong> ' + event.Session + '</p>' +
                      '<p><strong>Product:</strong> ' + event.product + '</p>' +
                      '<p><strong>Time:</strong> ' + displayEventDate + '</p>' +
                      '<div class="popoverDescCalendar"><strong>Customer:</strong> '+ event.description +'</div>' +
                      '</div>',
            delay: { 
               show: "800", 
               hide: "50"
            },
            trigger: 'hover',
            placement: 'top',
            html: true,
            container: 'body'
          });
         
           if (event.title == "Rahul") {
               element.css('background-color', '#f4516c');
           }
           if (event.username == "Peter Grant") {
               element.css('background-color', '#1756ff');
           }
           if (event.username == "Adam Rackham") {
               element.css('background-color', '#9816f4');
           }

           var show_username, show_type = true, show_calendar = true;

           var username = $('input:checkbox.filter:checked').map(function() {
               return $(this).val();
           }).get();
           var types = $('#type_filter').val();
           var calendars = $('#calendar_filter').val();

           show_username = username.indexOf(event.username) >= 0;

           if (types && types.length > 0) {
               if (types[0] == "all") {
                   show_type = true;
               } else {
                   show_type = types.indexOf(event.type) >= 0;
               }
           }

           if (calendars && calendars.length > 0) {
               if (calendars[0] == "all") {
                   show_calendar = true;
               } else {
                   show_calendar = calendars.indexOf(event.calendar) >= 0;
               }
           }

           //return show_username && show_type && show_calendar;
           return  show_type && show_calendar;
          
       },
       customButtons: {
          printButton: {
            icon: 'print',
            click: function() {
              window.print();
            }
          }
        },
       header: {
           left: 'today, prevYear, nextYear, printButton',
           center: 'prev, title, next',
           right: 'month,agendaWeek,agendaDay,listWeek'
       },
       views: {
            month: {
              columnFormat:'dddd'
            },
            agendaWeek:{
              columnFormat:'ddd D/M',
              eventLimit: false
            },
            agendaDay:{
              columnFormat:'dddd',
              eventLimit: false
            },
            listWeek:{
              columnFormat:''
            }
        },
     
       loading: function(bool) {
           //alert('events are being rendered');
       },
       eventAfterAllRender: function(view) {
           if(view.name == "month"){
              $(".fc-content").css('height','auto');
            }
       },
       eventLimitClick: function(cellInfo, event) {
           

       },
       eventResize: function(event, delta, revertFunc, jsEvent, ui, view) {
            $('.popover.fade.top').remove();
       },
       eventDragStart: function(event, jsEvent, ui, view) {
            var draggedEventIsAllDay;
            draggedEventIsAllDay = event.allDay;
       },
       eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
            $('.popover.fade.top').remove();
       },
       unselect: function(jsEvent, view) {
          //$(".dropNewEvent").hide();
       },
       dayClick: function(startDate, jsEvent, view) {
         
         //var today = moment();
         //var startDate;
         
         //if(view.name == "month"){
           
         //  startDate.set({ hours: today.hours(), minute: today.minutes() });
         //  alert('Clicked on: ' + startDate.format());
           
         //}
         
       },
       select: function(startDate, endDate, jsEvent, view) {
         
         var today = moment();
         var startDate;
         var endDate;
         
         if(view.name == "month"){
            startDate.set({ hours: today.hours(), minute: today.minutes() });
            startDate = moment(startDate).format('ddd DD MMM YYYY HH:mm');
            endDate = moment(endDate).subtract('days', 1);
            endDate.set({ hours: today.hours() + 1, minute: today.minutes() });
            endDate = moment(endDate).format('ddd DD MMM YYYY HH:mm');           
         }else{
            startDate = moment(startDate).format('ddd DD MMM YYYY HH:mm');
            endDate = moment(endDate).format('ddd DD MMM YYYY HH:mm');
         }
         
         var $contextMenu = $("#contextMenu");
         
         var HTMLContent = '<ul class="dropdown-menu dropNewEvent" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Appointment" +'")\'> <a tabindex="-1" href="#">Add Appointment</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Check-in" +'")\'> <a tabindex="-1" href="#">Add Check-In</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Checkout" +'")\'> <a tabindex="-1" href="#">Add Checkout</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Inventory" +'")\'> <a tabindex="-1" href="#">Add Inventory</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Valuation" +'")\'> <a tabindex="-1" href="#">Add Valuation</a></li>' +
      '<li onclick=\'newEvent("'+ startDate +'","'+ endDate +'","'+ "Viewing" +'")\'> <a tabindex="-1" href="#">Add Viewing</a></li>' +
      '<li class="divider"></li>' +
      '<li><a tabindex="-1" href="#">Close</a></li>' +
    '</ul>';
          
          $(".fc-body").unbind('click');
          $(".fc-body").on('click', 'td', function (e) {
              
              document.getElementById('contextMenu').innerHTML = (HTMLContent);

              $contextMenu.addClass("contextOpened");
              $contextMenu.css({
                display: "block",
                left: e.pageX,
                top: e.pageY
              });
              return false;
            
            });

            $contextMenu.on("click", "a", function(e) {
              e.preventDefault();
              $contextMenu.removeClass("contextOpened");
              $contextMenu.hide();
            });
         
            $('body').on('click', function() {
               $contextMenu.hide();
               $contextMenu.removeClass("contextOpened");
           });

         //newEvent(startDate, endDate);
         
        },
        eventClick: function(event, jsEvent, view) {
          
          editEvent(event);
          
        },
       locale: 'en-GB',
       timezone: "local",
       nextDayThreshold: "09:00:00",
       allDaySlot: true,
       displayEventTime: true,
       displayEventEnd: true,
       firstDay: 1,
       weekNumbers: false,
       selectable: true,
       weekNumberCalculation: "ISO",
       eventLimit: true,
       eventLimitClick: 'week', //popover
       navLinks: true,
       defaultDate: moment('2021-06-07'),
       timeFormat: 'HH:mm',
       defaultTimedEventDuration: '01:00:00',
       editable: true,
       minTime: '07:00:00',
       maxTime: '18:00:00',
       slotLabelFormat: 'HH:mm', 
       weekends: true,
       nowIndicator: true,
       dayPopoverFormat: 'dddd DD/MM', 
       longPressDelay : 0,
       eventLongPressDelay : 0,
       selectLongPressDelay : 0,
       
       events: [
       <?php foreach ($schedulesList as $key => $value) {
       // echo '<pre>'; print_r($value);

        $trainerName= App\Models\Trainer::where('id',$value->trainerId)->first()
        ?>
        
       {
           _id: 1,
           title: "<?=$trainerName->name?>",
           avatar: 'https://republika.mk/wp-content/uploads/2017/07/man-852762_960_720.jpg',
           description: "<?=$value->customerName?>",
           start: "<?=$value->date.'T'.$value->startTime?>",
           end: "<?=$value->date.'T'.$value->endTime?>",
           type: '<?=$trainerName->name?>',
           product: "<?=$value->product?>",
           Session: <?=$value->sessionId?>,
           className: 'colorAppointment',
           username: 'Adam Rackham',
           backgroundColor: "#007500",
           textColor: "#ffffff",
           allDay: false
       },

       <?php } ?>
       ]

   });
  
   $('.filter').on('change', function() {
       $('#calendar').fullCalendar('rerenderEvents');
   });

   $("#type_filter").select2({
       placeholder: "Filter Types",
       allowClear: true
   });

   $("#calendar_filter").select2({
       placeholder: "Filter Calendars",
       allowClear: true
   });
  
  $("#starts-at, #ends-at").datetimepicker({
    format: 'ddd DD MMM YYYY HH:mm'
  });
  
  //var minDate = moment().subtract(0, 'days').millisecond(0).second(0).minute(0).hour(0);
  
  $(" #editStartDate, #editEndDate").datetimepicker({
    format: 'ddd DD MMM YYYY HH:mm'
    //minDate: minDate
  });
  
  //CREATE NEW EVENT CALENDAR

  newEvent = function(start, end, eventType) {
      
      var colorEventyType;
      
      if (eventType == "Appointment"){
        colorEventyType = "colorAppointment";
      }
      else if (eventType == "Check-in"){
        colorEventyType = "colorCheck-in";
      }
      else if (eventType == "Checkout"){
        colorEventyType = "colorCheckout";
      }
      else if (eventType == "Inventory"){
        colorEventyType = "colorInventory";
      }
      else if (eventType == "Valuation"){
        colorEventyType = "colorValuation";
      }
      else if (eventType == "Viewing"){
        colorEventyType = "colorViewing";
      }

      $("#contextMenu").hide();
      $('.eventType').text(eventType);
      $('input#title').val("");
      $('#starts-at').val(start);
      $('#ends-at').val(end);
      $('#newEventModal').modal('show');
      
      var statusAllDay;
      var endDay;
    
      $('.allDayNewEvent').on('change',function () {
      
        if ($(this).is(':checked')) {
          statusAllDay = true;
          var endDay = $('#ends-at').prop('disabled', true);
        } else {
          statusAllDay = false;
          var endDay = $('#ends-at').prop('disabled', false);
        }   
      });
      
      //GENERATE RAMDON ID - JUST FOR TEST - DELETE IT
      var eventId = 1 + Math.floor(Math.random() * 1000);
      //GENERATE RAMDON ID - JUST FOR TEST - DELETE IT
    
      $('#save-event').unbind();
      $('#save-event').on('click', function() {
      var title = $('input#title').val();
      var startDay = $('#starts-at').val();
      if(!$(".allDayNewEvent").is(':checked')){
        var endDay = $('#ends-at').val();
      }
      var calendar = $('#calendar-type').val();
      var description = $('#add-event-desc').val();
      var type = eventType;
      if (title) {
        var eventData = {
            _id: eventId,
            title: title,
            avatar: 'https://i.ibb.co/tzNj68N/Old-scratches-grunge-stamp-with-red-text-BOOKED.jpg',
            start: startDay,
            end: endDay,
            description: description,
            type: type,
            calendar: calendar,
            className: colorEventyType,
            username: 'Caio Vitorelli',
            backgroundColor: '#1756ff',
            textColor: '#ffffff',
            allDay: statusAllDay
        };
        $("#calendar").fullCalendar('renderEvent', eventData, true);
        $('#newEventModal').find('input, textarea').val('');
        $('#newEventModal').find('input:checkbox').prop('checked',false);
        $('#ends-at').prop('disabled', false);
        $('#newEventModal').modal('hide');
        }
      else {
        alert("Title can't be blank. Please try again.")
      }
      });
    }
    
  //EDIT EVENT CALENDAR
  
    editEvent = function(event, element, view) {

        $('.popover.fade.top').remove();
        $(element).popover("hide");
      
        //$(".dropdown").hide().css("visibility", "hidden");
      
        if(event.allDay == true){
          $('#editEventModal').find('#editEndDate').attr("disabled", true);
          $('#editEventModal').find('#editEndDate').val("");
          $(".allDayEdit").prop('checked', true);
        }else{
          $('#editEventModal').find('#editEndDate').attr("disabled", false);
          $('#editEventModal').find('#editEndDate').val(event.end.format('ddd DD MMM YYYY HH:mm'));
          $(".allDayEdit").prop('checked', false);
        }
      
        $('.allDayEdit').on('change',function () {
      
          if ($(this).is(':checked')) {
              $('#editEventModal').find('#editEndDate').attr("disabled", true);
              $('#editEventModal').find('#editEndDate').val("");
              $(".allDayEdit").prop('checked', true);
            } else {
              $('#editEventModal').find('#editEndDate').attr("disabled", false);
              $(".allDayEdit").prop('checked', false);
            }   
        });
        
        $('#editTitle').val(event.title);
        $('#editStartDate').val(event.start.format('ddd DD MMM YYYY HH:mm'));
        $('#edit-calendar-type').val(event.calendar);
        $('#edit-event-desc').val(event.description);
        $('.eventName').text(event.title);
        $('#editEventModal').modal('show');
        $('#updateEvent').unbind();
        $('#updateEvent').on('click', function() {
          var statusAllDay;
          if ($(".allDayEdit").is(':checked')) {
            statusAllDay = true;
          }else{
            statusAllDay = false;
          }
          var title = $('input#editTitle').val();
          var startDate = $('input#editStartDate').val();
          var endDate = $('input#editEndDate').val();
          var calendar = $('#edit-calendar-type').val();
          var description = $('#edit-event-desc').val();
          $('#editEventModal').modal('hide');
          var eventData;
          if (title) {
            event.title = title
            event.start = startDate
            event.end = endDate
            event.calendar = calendar
            event.description = description
            event.allDay = statusAllDay
            $("#calendar").fullCalendar('updateEvent', event);
          } else {
          alert("Title can't be blank. Please try again.")
          }
        });
      
        $('#deleteEvent').on('click', function() {
          $('#deleteEvent').unbind();
          if (event._id.includes("_fc")){
            $("#calendar").fullCalendar('removeEvents', [event._id]);
          } else {
            $("#calendar").fullCalendar('removeEvents', [event._id]);
          }
          $('#editEventModal').modal('hide');
        });
      }
    

  //SET DEFAULT VIEW CALENDAR
    
  var defaultCalendarView = $("#calendar_view").val();
  
  if(defaultCalendarView == 'month'){                             
      $('#calendar').fullCalendar( 'changeView', 'month');
  }else if(defaultCalendarView == 'agendaWeek'){
      $('#calendar').fullCalendar( 'changeView', 'agendaWeek');
  }else if(defaultCalendarView == 'agendaDay'){
      $('#calendar').fullCalendar( 'changeView', 'agendaDay');
  }else if(defaultCalendarView == 'listWeek'){
      $('#calendar').fullCalendar( 'changeView', 'listWeek');
  }
  
  $('#calendar_view').on('change',function () {
    
    var defaultCalendarView = $("#calendar_view").val();
    $('#calendar').fullCalendar('changeView', defaultCalendarView);
    
  });
  
  //SET MIN TIME AGENDA
    
  $('#calendar_start_time').on('change',function () {
    
    var minTimeAgendaView = $(this).val();
    $('#calendar').fullCalendar('option', {minTime: minTimeAgendaView});
    
  });
  
  //SET MAX TIME AGENDA
    
  $('#calendar_end_time').on('change',function () {
    
    var maxTimeAgendaView = $(this).val();
    $('#calendar').fullCalendar('option', {maxTime: maxTimeAgendaView});
    
  });
  
  //SHOW - HIDE WEEKENDS
  
  var activeInactiveWeekends = false;
  checkCalendarWeekends();

  $('.showHideWeekend').on('change',function () {
    checkCalendarWeekends();
  });
  
  function checkCalendarWeekends(){
    
    if ($('.showHideWeekend').is(':checked')) {
      activeInactiveWeekends = true;
      $('#calendar').fullCalendar('option', {
        weekends: activeInactiveWeekends
      });
    } else {
      activeInactiveWeekends = false;
      $('#calendar').fullCalendar('option', {
        weekends: activeInactiveWeekends
      });
    }   
    
  }
  
  //CREATE NEW CALENDAR AND APPEND
  
  $('#addCustomCalendar').on('click', function() {
    
    var newCalendarName = $("#inputCustomCalendar").val();
    $('#calendar_filter, #calendar-type, #edit-calendar-type').append($('<option>', {
        value: newCalendarName,
        text: newCalendarName
    }));
    $("#inputCustomCalendar").val("");
    
  });
  
  //WEATHER GRAMATICALLY
  
  function retira_acentos(str) {
    var com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝRÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿr";
    var sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";
    var novastr="";
    for(i=0; i<str.length; i++) {
      troca=false;
      for (a=0; a<com_acento.length; a++) {
        if (str.substr(i,1)==com_acento.substr(a,1)) {
          novastr+=sem_acento.substr(a,1);
          troca=true;
          break;
        }
      }
      if (troca==false) {
        novastr+=str.substr(i,1);
      }
    }
    return novastr.toLowerCase().replace( /\s/g, '-' );
  }
  
  //WEATHER THEMES
  
  document.getElementById('switchWeatherTheme').addEventListener('change', function(){
    
    var valueTheme = $(this).val();
    var widget = document.querySelector('.weatherwidget-io');
    widget.setAttribute('data-theme', valueTheme);
    __weatherwidget_init();
    
  });
  
  //WEATHER LOCATION
  var input = document.getElementById('searchTextField');
  var autocomplete = new google.maps.places.Autocomplete(input);
  
  google.maps.event.addListener(autocomplete, 'place_changed', function () {
    var place = autocomplete.getPlace();
    var latitude = place.geometry.location.lat();
    var longitude = place.geometry.location.lng();
    var newPlace = retira_acentos(place.name);
    
    var urlDataWeather = 'https://forecast7.com/en/'+ latitude.toFixed(2).replace(/\./g,'d').replace(/\-/g,'n') + longitude.toFixed(2).replace(/\./g,'d').replace(/\-/g,'n') + '/'+ newPlace +'/';
    
    alert(urlDataWeather);
    
    var weatherWidget = document.querySelector('.weatherwidget-io');
    weatherWidget.href = urlDataWeather;
    weatherWidget.dataset.label_1 = place.name;
    __weatherwidget_init();
    
    //document.getElementById('city2').value = place.name;
    //document.getElementById('cityLat').value = place.geometry.location.lat();
    //document.getElementById('cityLng').value = place.geometry.location.lng();
    //alert("This function is working!");
    //alert(place.name);
    // alert(place.address_components[0].long_name);

  });
  
});
</script>
@endsection
