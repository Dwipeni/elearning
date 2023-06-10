<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data Pendaftar</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
	</style>
	<center>
		<h2>Data Pendaftar Kursus Bimbel AirLangga Malang</h2>
	</center>
    <br>
    <br>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <td></td>
                <th>Nama Pendaftar</th>
                <td></td>
                <th>No Hp</th>
                <td></td>
                <th>Jenis Kelas</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td></td>
                <td>{{ $item->nama_pendaftar }}</td>
                <td></td>
                <td>{{ $item->no_hp }}</td>
                <td></td>
                <td>{{ $item->jenis_kelas }}</td>
            </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>