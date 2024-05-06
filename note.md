===========Query Builder===========
Menjalankan raw query seperti yang kita bahas dalam bab sebelumnya tidak umum dilakukan
dalam sebuah framework PHP. Biasanya, framework menyediakan semacam interface khusus
yang penulisannya lebih rapi, bahkan kita tidak perlu menulis query SQL sama sekali. Salah
satu interface tersebut adalah Query Builder. dan kode program kita menjadi lebih rapi dan lebih mudah dibaca. 


disini kita mengunakan controller 
Mahasiswa dan menggunakan route sebelumnya.
agar lebih bagus nya dan mengetahui perbedaan nya buatlah projek baru


1. menginpu data
Query builder menyediakan method insert() untuk proses input data ke dalam tabel. Method
ini butuh sebuah argument dalam bentuk associative array dengan key berupa nama kolom
public function insert(){
        $data = DB::table('mahasiswas')->insert(
            [
                'nim'=> '230',
                'nama'=> 'sabardi',
                'tanggal_lahir'=> '2000-01-04',
                'ipk'=> '3.5',
                'created_at'=> now(),
                'updated_at'=> now()
            ]
            
            [
                'nim'=> '00383',
                'nama'=> 'sabardi',
                'tanggal_lahir'=> '2000-01-04',
                'ipk'=> '3.5',
                'created_at'=> now(),
                'updated_at'=> now()
            ]
        );
        dump($data);
    }
cara paling simple memahami nya adalah 
Hampir semua perintah query builder diawali dengan memilih tabel yang akan dipakai.
Caranya, jalankan method DB::table(<nama_tabel>), baru kemudian diikuti dengan nama
method.

2. Mengupdate Data
