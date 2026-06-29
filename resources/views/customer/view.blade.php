<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />



    <title>Customer Table</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            padding: 20px;
            background: #f4f4f4;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        /* Mobile Responsive */
        @media (max-width:768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                background: #fff;
            }

            td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 45%;
                font-weight: bold;
                text-align: left;
            }
        }

        .detail-btn {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            margin-bottton: 30px;
        }

        .detail-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .detal-btn {
            background-color: red;
            color: white;
            padding: 5px 8px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            margin-bottton: 30px;
            text-decoration: none;
        }

        .detal-btn:hover {
            background: rgb(143, 55, 55);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .detil-btn {
            background-color: green;
            color: white;
            padding: 5px 8px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
            margin-bottton: 30px;
            text-decoration: none;
        }

        .detil-btn:hover {
            background: rgb(50, 109, 50);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <button class="detail-btn" onclick="window.location.href='{{ route('customer.create') }}'">
        Add Customer
    </button>
    <div class="table-container">
        <table id="datatable" class="display">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Father Name</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Action</th>

                </tr>
            </thead>

            {{--  <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td data-label="Customer Name">{{ $customer->customer_name }}</td>
                        <td data-label="Father Name">{{ $customer->father_name }}</td>
                        <td data-label="Phone No">{{ $customer->phone_no }}</td>
                        <td data-label="Address ">{{ \Illuminate\Support\Str::words($customer->address, 5,'...') }}</td>
                        <td data-label="Action"><a class="detal-btn" href="{{ route('customer.delete', $customer->id) }}">Delete</a>
                            <a class="detil-btn"  href="{{ route('customer.edit', $customer->id) }}">EDIT</a></td>

                    </tr>
                @endforeach

            </tbody> --}}
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>



</body>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [
                [0, "desc"]
            ],
            ajax: "{{ url('users-data') }}",
            columns: [{
                    data: 'customer_name'
                },
                {
                    data: 'father_name'
                },
                {
                    data: 'phone_no'
                },
                {
                    data: 'address'
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>

</html>
