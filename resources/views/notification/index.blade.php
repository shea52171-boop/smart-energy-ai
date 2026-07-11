@extends('adminlte::page')

@section('title', 'Notification Center')

@section('content_header')
    <h1>
        <i class="fab fa-whatsapp text-success"></i>
        Notification Center
    </h1>
@endsection

@section('content')

<div class="card">

    <div class="card-header bg-success">

        <h3 class="card-title">

            <i class="fab fa-whatsapp"></i>

            Riwayat Notifikasi WhatsApp

        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Machine</th>
                    <th>Recipient</th>
                    <th>Status</th>
                    <th>Send Time</th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>1</td>

                    <td>CNC-01</td>

                    <td>+628123456789</td>

                    <td>

                        <span class="badge badge-success">

                            Delivered

                        </span>

                    </td>

                    <td>

                        10 Jul 2026 14:21

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection