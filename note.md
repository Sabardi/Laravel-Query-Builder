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
Untuk proses update data tabel, query builder menyediakan method update. Method ini butuh
sebuah argument berbentuk array yang berisi data yang akan di update. Namun untuk proses
update, kita butuh bantuan dari method where() untuk menentukan kondisi yang dicari. 

    public function update(){
        $data = DB::table('mahasiswas')->where('id','3')->update([
            'nim'=> '023p1SSW0383',
            'tanggal_lahir' => '2002-01-01',
            'ipk'=> '3.19',
            'created_at'=> now()
        ]);

        dump($data);
    }

    public function updateWhere(){
        $result = DB::table('mahasiswas')
        ->where('ipk','<',3)
        ->where('nama','<>','alex')
        ->update(
         [
         'tanggal_lahir' => '2002-01-01',
         'updated_at' => now(),
         ]
         );

         dump($result);
    }
Cara penggunaan method where() ini sama seperti yang pernah kita pakai di bab collection,
yakni bisa di isi dengan 2 atau 3 argument. Jika diisi dengan 2 argument, maka operasi
perbandingan yang dipakai adalah 'sama dengan', misalnya where('nama','Sari Citra
Lestari'), akan mencari isi kolom nama yang sama dengan 'Sari Citra Lestari'.
Jika method where() dipanggil dengan 3 argument, maka argument kedua akan menjadi
operator perbandingan. Sebagai contoh, where('ipk','<',3) akan mencari kolom ipk dengan
nilai kurang dari 3, sedangkan where('nama','<>','alex') akan mencari kolom nama yang
tidak sama dengan 'alex'.
Hasilnya, hanya baris yang memenuhi kedua kondisi inilah yang akan di update. 


3. proses update dan insert
Query builder juga menyediakan method lain bernama updateOrInsert(), yang merupakan
gabungan dari proses update dan insert. Jika data yang ingin di update belum ada di tabel,
maka jalankan proses insert.

Method updateOrInsert() butuh 2 buah argument. Argument pertama berupa associative
array yang berisi kondisi yang dicari. Dalam contoh di atas, saya ingin mencari mahasiswa
dengan nim '19005011'. Kemudian sebagai argument kedua adalah data yang akan di update,
yang juga ditulis dalam bentuk associative array.
Jika dalam tabel terdapat mahasiswa dengan nim 19005011, maka data mahasiswa tersebut
akan di update dengan isi dari argument kedua. Namun jika tidak ditemukan mahasiswa
dengan nim tersebut, maka lakukan proses insert.

4. Menghapus Data
Query builder menyediakan method delete() untuk menghapus data. Method ini tidak butuh
argument apapun, dimana untuk menentukan kolom mana yang akan dihapus kita butuh
method where().

 public function delete(){
        $data = DB::table('mahasiswas')->where('id','1')->delete();
        dump($data);
    }

kita juga bisa mneggunakan perbandingan
 public function delete(){
        $data = DB::table('mahasiswas')
        ->where('ipk','>=',3.1)->delete();
        dump($data);
    }

menampilkan data nya ke view
    public function getView(){
        $result = DB::table('mahasiswas')->get();
        return view('welcome',['mahasiswas' => $result]);
    }

5. Method where() dan orderBy()
Query builder juga menyediakan berbagai method lain untuk proses pencarian yang lebih
detail, misalnya digabung dengan method where() dan orderBy()


Perintah DB::table('mahasiswas')->where('ipk','<','3')->orderBy('nama', 'desc')-
>get() bisa dibaca: 'Ambil semua isi tabel mahasiswas dengan kondisi ipk < 3, lalu urutkan
berdasarkan nama secara menurun'. 

