<!DOCTYPE html>
<html>
<head>
	<title>Cetak Data User</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
	</style>
	<center>
		<h2>Data User Kursus Online "Youth Course"</h2>
	</center>
    <br>
    <br>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th>No</th>
                <td></td>
                <th>Nama User</th>
                <td></td>
                <th>Email</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td></td>
                <td>{{ $item->name }}</td>
                <td></td>
                <td>{{ $item->email }}</td>
            </tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>