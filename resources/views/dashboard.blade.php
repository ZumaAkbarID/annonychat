<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>

    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>IP Address</th>
                <th>URL Ref</th>
                <th>User Agent</th>
                <th>Message</th>
                <th>FastWa Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $msg)
                <tr>
                    <td>{{ $msg->ip_address }}</td>
                    <td>{{ $msg->url_ref }}</td>
                    <td>{{ $msg->user_agent }}</td>
                    <td>{{ $msg->message }}</td>
                    <td>{{ $msg->fastwa_status }}</td>
                    <td>{{ $msg->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
