<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Transaksi</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
	</style>
	<center>
		<h2>Data Transaksi Kursus Online "Youth Course"</h2>
	</center>
    <br>
    <br>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Status</th>
                <th>Tanggal Bayar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->users->name }}</td>
                <td>
                    @if ($item->status == 0)
                    Belum Dicek
                    @elseif($item->status == 1)
                    Disetujui
                    @else
                    Ditolak
                    @endif
                </td>
                <td>{{ substr($item->created_at,0,10) }}</td>
            </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>