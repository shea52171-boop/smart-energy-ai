@extends('adminlte::page')

@section('title', 'Smart Alert')

@section('content_header')
<h1>
    <i class="fas fa-exclamation-triangle text-danger"></i>
    Smart Alert
</h1>
@stop

@section('content')

<div class="card card-danger">

    <div class="card-header">

        <h3 class="card-title">

            Critical Machine Alert

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Machine</th>

                    <th>Temperature</th>

                    <th>Current</th>

                    <th>Risk</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>ALT001</td>

                    <td>CNC-01</td>

                    <td>97°C</td>

                    <td>18 A</td>

                    <td>

                        <span class="badge badge-danger">

                            CRITICAL

                        </span>

                    </td>

                    <td>

                        <span class="badge badge-warning">

                            OPEN

                        </span>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@stop