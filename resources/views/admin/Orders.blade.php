@extends('layouts.AdminLayout')


@section('meta')
    <title>Orders</title>
    <link rel="stylesheet" href="{{ asset('sass/orders.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
@endsection

@section('main')
    <div>
        <div class="nav-bar">
            <h1 class="title">Orders</h1>
        </div>
        <div class="table-wrapper">
            <div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Total</th>
                            <th>State</th>
                            <th>Order date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->total }}</td>
                                <td data-id='{{ $order->id }}'>{{ $order->state }}</td>
                                <td>{{ $order->created_at }}</td>
                                @if ($order->state === 'pending')
                                    <td><button class="action" data-id="{{ $order->id }}">Set as delivered</button> </td>
                                @else
                                    <td>
                                        <p class="m-0">Delivered</p>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const buttons = document.querySelectorAll('.action')

        buttons.forEach(element => {
            element.addEventListener('click', function test() {
                axios.post(`edit-order-state/${element.dataset.id}`).then(resp => {
                    element.textContent = 'Delivered'
                    element.style.color = '#212529'
                    element.style.cursor = 'default'
                });
            })
        });
    </script>
@endsection
