<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
</head>
<body>
    <div class="container my-3">
        <h2 class="text-center">Laporan</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Transaction</th>
                <th scope="col">User</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
                <th scope="col">Item</th>
            </tr>
            </thead>
            @forelse ($data as $item)
            <tbody>
                <tr>
                    <th>{{ $item['transaction'] }}</th>
                    <td>{{ $item['user'] }}</td>
                    <td>{{ $item['total'] }}</td>
                    <td>{{ $item['date']  }}</td>
                    <td>{{ $item['item']  }}</td>
                </tr>
                </tbody>
            @empty
                <h2>data not found</h2>
            @endforelse
                
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>