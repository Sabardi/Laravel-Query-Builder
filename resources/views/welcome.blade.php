<h1 class="mb-3">Data Mahasiswa</h1>
<div class="row">
<div class="m-auto">
<ol class="list-group">
@forelse ($mahasiswas as $mahasiswa)
<li class="list-group-item">
{{$mahasiswa->nama}} ( {{$mahasiswa->nim}} ),
Tanggal Lahir: {{$mahasiswa->tanggal_lahir}},
 IPK: {{$mahasiswa->ipk}}
 </li>
 @empty
 <div class="alert alert-dark d-inline-block">Tidak ada data...</div>
 @endforelse
 </ol>
 </div>
 </div>
 </div
