Report 26/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membubat javascript untuk aksi button call debitur 
2. Menmpilkan modal aksi call debitur 
3. Membuat kondisi proses simpan aksi call debitur selain follow up
4. Menampilkan combobox sesuai on change yang dipilih saat aksi tindakan
5. Membuat fungsi javascript untuk aksi simpan form pada saat pilih follow up 
6. Membuat fungsi ambil_proses_fu
7. Membuat fungsi input_fu, proses input fu 
8. Membuat fungsi ubah_aksi_call, proses ubah data tindakan 
9. Membuat fungsi simpan_tl_kunjungan, proses simpan data form follow up debitur

Progress : 66%

Report 27/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman tasklist
2. Membuat fungsi tasklist pada controller manager 
3. Membuat fungsi tambah_tl_khusus proses tambah tasklist khusus 
4. Membuat fungsi form_edit_tasklist, menampilkan edit tasklist 
5. Membuat fungsi ubah_tasklist, proses ubah data tasklist 
6. Membuat fungsi tampil_tasklist_khushus, menampilkan data tasklist khusus dengan datatables 
7. Membuat fungsi get_data_task_khusus pada model_manager untuk query menampilkan data 

Progress : 67%
Report 28/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat fungsi hapus_tasklist, proses hapus data tasklist khusus 
2. Membuat fungsi ubah_status_tasklist, untuk proses ubah status tasklist 
3. Membuat fungsi javascript status selesai dan tidak selesai 
4. Membuat form detail tasklist 
- membuat fungsi form_detail_tasklist, menampilkan form detail tasklist 
- membuat view form detail tasklist
- membuat javascript untuk menampilkan detail verifikator 
5. Membuat halaman tasklist kunjungan 
6. Membuat fungsi untuk menampilkan tabel dengan dataTables
7. Membuat aksi javascript tampil form tambah kunjungan, edit kunjungan
8. Membuat aksi javscript untuk aksi hapus kunjungan

Progress : 70%
Report 30/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman list kelolaan 
- membuat fungsi list_kelolaan utk menampilkan halaman list kelolaan 
- membuat fungsi tampil_list_kelolaan untuk menampilkan data list kelolaan dengan datatables 
2. Membuat fungsi javascript untuk menampilkan combobox linked antara bank, cabang bank dan capem bank 
3. Membuat aksi untuk menambahkan data kelolaan verifikator 
4. Menambahkan view untuk halaman tambah kelolaan verifikator
- membuat fungsi javascript untuk membuat datatable tabel tambah kelolaan
- membuat filter data saat cabnag bank terpilih 
5. Membuat fungsi javadscript saat aksi button tambah data 
6. Membuat fungsi javascript untuk aksi kembali ke halaman sebelumnya 
7. Membuat fungsi javascript untuk proses simpan_pilih_kelolaan 
8. Membuat fungsi proses_tambah_kelolaan pada controller manager

Progress : 75%

Report 01/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat fungsi javascript untuk proses simpan prioritas 
2. Membuat fungsi proses_tambah_prioritas pada controller manager
3. Membuat kondisi pada saat aksi simpan prioritas 
- jika semua data masih kosong
- jika belum terpilih debitur dan jika input data date bbelum terisi   
4. Membuat kondisi pada halaman tambah kelolaan
- jika semua data masih kosong
- jika pilihan cabang dan capem bank kelolaan belum dipilih

Progress : 80%

Report 02/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki fungsi model get_data_prioritas
- menampilkan field jumlah dengan mnambahkan query pada select didalam select, menampilkan list prioritas
2. Menambahkan fungsi javascript untuk menampilkan input date utk tanggal expired jika telah terpilih (checked)
3. Membuat fungsi javascript tabel tambah prioritas menggunakan datatable bbserta dengan filter data 
4. Membuat fungsi tampil_list_tambah_prioritas menampilkan list data debitur yang belum menjadi prioritas 
5. Membuat fungsi javascript untuk linked combobox pada verifikator dengan capem bank
6. Membuat fungsi ambil_capem_ver, untuk menampilkan option capembank dari verifikator

Progress : 85%

Report 03/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Melakukan testing terhadap alur data yang diterima sistem 
2. Memperbaiki fungsi proses_ubah_ots
- menambahkan ubah data terhadap status pada tabel debitur
3. Memperbaiki fungsi proses_ubah_kembali
- menambahkan ubah data terhadap field status dan potensial menjadi bernilai null 
4. Memperbaiki fungsi list prioritas pada controller manager 
- menambahkan fungsi untuk melakukan perubahan status menjadi 0 bila sudah masuk tanggal expired
5. Memperbaiki view halaman tasklist kunjungan 
- menampilkan tambah data kunjungan bila data debitur ada pada combobox debitur 
- memperbaiki fungsi javascript untuk menampilkan atau menghilangkan button tambah data kunjungan pada saat tambah data ataupun pada saat hapus data

Progress : 95%

Report 04/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menyelesaikan halaman tindakan hukum
- Membuat fungsi tindakan hukum, controller manager
- Membuat fungsi tampil_tindakan_hukum, controller manager
- Membuat fungsi ubah_keputusan, controller manager
2. Menyelesaikan halaman ekesekusi jaminan
- Membuat fungsi eksekusi, controller manager
- Membuat fungsi tampil_ek_jaminan, controller manager
- Membuat fungsi ubah_status_info, controller manager
- Membuat fungsi ubah_sifat_asset, controller manager
- Membuat fungsi ubah_status_proses, controller manager

Progress : 98%

Report 07/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki untuk semua level user pengguna 
2. Memperbaiki fungsi kunjungan_debitur pada controller c_data
- menambahkan parameter untuk syariah 
- membuat kondisi bila parameter syariah terisi
3. Memperbaiki fungsi tampil_data_potensial pada controller c_data 
- menambahkan paramter untuk syariah 
- menambahkan paramter untuk fungsi model get_data_potensial, jumlah_semua_potensial, jumlah_filter_potensial
4. Memperbaiki fungsi desk_col, controller c_data 
- menambahkan parameter syariah 
- membuat kondisi syariah untuk get_data_asuransi
5. Memperbaiki fungsi tampil_desk_col
- menambahkan paramter untuk syariah 
- menambahkan parameter syariah untuk get_data_desk_col, jumlah_semua_desk_col, jumlah_filter_desk_col
6. Memperbaiki fungsi tindakanHukum, controller c_data 
- menambahkan parameter syariah 
7. Memperbaiki fungsi tampil_tindakan_hukum
- menambahkan paramter untuk syariah 

Progress : 98%

Report 08/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat desain halaman V_login2 
2. Membuat view halaman home, V_home_new 
3. Membuat view halaman ots, V_ots_new 

Progress : 25%

Nama Project    : SIP BJB (Revisi)
Tahapan         : Build
Detail          : 

1. Setting koneksi codeigniter dengan database sql server 
2. Melakukan perubahan setingan pada php.ini 
3. Menambahkan file php sql server pada direktori php/ext 
4. Memperbaiki query halaman atur kelolaan 
5. Memperbaiki semua query untuk semua halaman report

Progress : 100%

Report 09/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki view halaman v_login_2
- merubah tampilan awal login 
2. Memperbaiki view halaman home, V_home_new 
- mnambahkan fungsi javascript untuk linked combobox, bank-cabang bank-capem bank
3. Memperbaiki view halaman ots, V_ots_new 
- menambahkan filter data ots 
- manambahkan tabel tampil data ots 
- menambahkan fungsi javascript untuk menampilkan data ots dengan dataTables 
- menambahkan fungsi javascript untuk linked combobox pada filter data
4. Memperbaiki fungsi index pada controller home 
- menambakan variable data asuransi dan bank
5. Menambahkan fungsi pada controller home
- fungsi ambil_cabang_asuransi, mengambil cabang asuransi dari id_cabang 
- fungsi ambil_cabang_bank, mengambil cabang_bank dari id_bank 
- fungsi ambil_capem_bank, mengsmbil capem_bank dari id_cabang 
- fungsi ambil_verifikator, mengambil nama verifikator dari id_capem_bank
6. Memperbaiki fungsi pada controller R_ots 
- menambahkan variable data untuk bank, asuransi, verifikator 
7. Membuat fungsi pada controller R_ots 
- fungsi tampil_data_ots, untuk menampilkan data ots 
8. Membuat fungsi pada model_home 
- fungsi get_data, ambil data tabel 
- fungsi cari_cab_asuransi, mencari cabang asuransi 
- fungsi cari_cab_bank, mencari cabang bank 
- fungsi cari_cap_bank, mencari capem bank 
- fungsi cari_ver, mencari nama verifikator 

Progress : 28%

Report 10/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menambahkan unduh excel pada halaman debitur potensial
2. Menambahkan unduh excel pada halaman debitur non potensial 
3. Menambahkan unduh excel pada halaman desk collection

Progress : 98%

Report 11/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menambahkan unduh excel halaman eksekusi jaminan
2. Menambahkan unduh excel halaman tindakan hukum 

Progress : 98%

Report 14/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki desain halaman dashboard
2. Mengubah fungsi home pada controller home 
3. Memperbaiki fungsi pada model home 
4. Memperbaiki view v_home

Progress : 30%

Report 15/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman r-ots
2. Menyelesaikan desain halaman r-ots 
3. Menambahkan filter data  
4. Membuat fungsi javascript untuk tabel ots dan tabel summary 

Progress : 33%

Report 16/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menyelesaikan halaman report, all report 
2. Menyelesaikan halaman report, dokumen upload 
3. Menyelesaikan halaman report, agunan/lain-lain

Progress : 35%


Report 17/10/2019

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Menyelesaikan halaman upload dokumen
2. Menyelesaikan halaman foto dokumen

Progress : 40%

Report 18/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman history kunjungan 
2. Membuat view v_kunjungan_ver 
3. Membuat fungsi javascript untuk dataTable kunjungan ver 
4. Membuat fungsi javascript untuk reset dan filter data 
5. Membuat fungsi javascript untuk menampilkan detail debitur dari verifikator 
6. Membuat controller kunjungan
- membuat fungsi index, untuk menampilkan halaman default halaman kunjungan 
- membuat fungsi tampil_kj_verifikator, menampilkan data verifikator dengan datatable server side 
- membuat fungsi tampil_detail_deb, untuk menampilkan halaman detail debitur
- membuat fungsi ambil_deb, untuk menampilkan debitur sesuai dengan capem bank
- membuat fungsi tampil_debitur_ver, untuk menampilkan list debitur sesuai verifikator
7. Membuat model kunjungan 
- membuat fungsi get_kj_verifikator,jumlah_semua_kj_ver,jumlah_filter_kj_ver untuk data verifikator datatable server side 
- membuat fungsi get_capem_ver, get_debitur_ver untuk menampilkan capem dan debitur 
- membuat fungsi get_tampil_debitur_ver,jumlah_semua_debitur_ver,jumlah_filter_debitur_ver untuk data detail debitur datatable serverside

Progress : 98%

Report 21/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Mengubah dan mnyamakan semua desain filter data halaman
2. Mengubah dan menyamakan semua warna tabel halaman 
3. Membuat halaman summary 
- membuat view V_summary  
- membuat 2 tab, summary asuransi dan summary bank 
- menambahkan fungsi javascript untuk linked combobox, bank-cabnag bank-capem bank, asuransi-cabang asuransi 
- membuat fungsi javascript untuk datatables summary bank dan asurasni 
- membuat fungsi summary, untul menampilkan halaman summary 
- membuat fungsi tampil_list_summary pd controller manager, untuk summary bank
- membuat fungsi get_data_summary, jumlah_semua_summary, jumlah_filter_summary pad model manager untuk summary bank
- membuat fungsi tampil_list_summary_as pd controller manager, untuk summary asuransi
- membuat fungsi get_data_summary_as, jumlah_semua_summary_as, jumlah_filter_summary_as pad model manager untuk summary asuransi

Progress : 98%

Report 22/10/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman summary
2. Memisahkan filter data summary bank dan summary asuransi 
3. Membuat 2 fungsi javascript untuk filter summary bank dan asuransi 
4. Membuat 2 fungsi javascript untuk filter summary bank dan asuransi 
5. Mengubah desain halaman summary 
6. Mengubah semua tanggal awal dan tanggal akhir, menjadi format tanggal Y-m-d pada model manager dan model data 
7. Membuat searching datatable menjadi tidak casesensitive 
- menambahkan lower pada semua kolom cari pada query yang menggunakan datatable server side 
- menambahkan strtolower pada inputan searching 

Progress : 98%

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Memperbaiki halaman report eks asset 
2. Membuat javascript datatables untuk tabel eks asset 
3. Membuat fungsi filter data 
- menambahkan pengiriman data, untuk mengambil nilai total
4. Membuat fungsi reset data
- menambahkan pengiriman data, untuk mengambil nilai total 
5. Mengubah fungsi index pada controller R_Eks_asset: 
- membuat fungsi get_cari_data_wilayah_ver pada model m_eks_asset 
- mengambil nilai semua total jumlah asset, hasil penjualan, dll 
- memberikan nilai dfault jika pertama kali load data 
6. Membuat fungsi ambil_data_total untuk mengambil nilai total total 
- tot_jumlah_asset, tot_hasil_penjualan, tot_jumlah_asset_sdh, tot_hasil_penjualan_pot
- disesuikan dengan inputan filter yang digunakan
7. Membuat fungsi tampil_eks_asset pada controller R_Eks_asset 
- menampilkan semua data report eks asset dengan data table 
- membuat fungsi get_data_eks_asset, jumlah_semua_eks_asset, jumlah_filter_eks_asset pada model m_eks_asset 
8. Membuat fungsi unduh_data pada controller R_Eks_asset
- menambahkan parameter untuk kondisi jika lihat print data atau unduh data langsung 
- membuat fungsi get_cari_data_r_eks_asset untuk lihat print dan unduh data

Progress : 48%

Report 20/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Proses pemindahan tampilan template d-care 
2. Membiat project d-care, pengaturan config, autoload dari codeigniter 
3. Membuat folder layout untuk pembagian pada view template 
4. Membuat halaman v_login
- menambahkan fungsi ajax pada v_login untuk proses cek login 
5. Memperbaiki semua view pada sistem template sebelumnya
6. Memperbaiki halaman debitur potensial, call debitur, tindakan hukum, eksekusi jaminan, dan OTS

Progress : 10%

Report 23/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman debitur potensial dan non potensial, pada controller
- membuat fungsi kunjungan_debitur
- membuat fungsi tampil_data_potensial 
- membuat fungsi ambil_cabang_asuransi
- membuat fungsi ambil_cabang_bank
- membuat fungsi ambil_capem_bank
2. Membuat view halaman v_kunjungan_deb 
- membuat javascrript untuk menampilkan data dengan datatables 
- membuat combobox linked

Progress : 20%

Nama Project    : R-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Pemindahan template r-care 
2. Membuat project R-care, pengaturan config, autoload dari codeigniter 
3. Membuat folder layout untuk pembagian pada view template 
4. Membuat halaman v_login
- menambahkan fungsi ajax pada v_login untuk proses cek login 
5. Memperbaki halaman dashboard, halaman ots, halaman noa

Progress : 15%


Report 24/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Membuat halaman desk collection, pada controller
- membuat fungsi desk_col
- membuat fungsi tampil_desk_col
- membuat fungsi form_kartu_debitur
- membuat view V_desk_col
- membuat view V_form_kartu_debitur
2. Membuat fungsi pada model M_data dan model_manager: 
- membuat fungsi get_data 
- membuat fungsi get_data_desk_col
- membuat fungsi jumlah_semua_desk_col
- membuat fungsi jumlah_filter_desk_col
- membuat fungsi get_data_kartu_debitur
- membuat fungsi get_data_recov
- membuat fungsi get_data_ots_2
- membuat fungsi jumlah_semua_ots_2
- membuat fungsi jumlah_filter_ots_2
3. Membuat Halaman on the spot 
- membuat fungsi on_the_spot
- membuat fungsi tampil_data_ots_2

Progress : 40%

Report 25/09/2019

Nama Project    : D-Care Iterasi 1.2
Tahapan         : Build
Detail          : 

1. Mememperbaiki halaman desk col 
2. Menampilkan form kartu debitur 
3. Membuat fungsi kartu debitur pada controller manager 
4. Membuat fungsi get_data_kartu_debitur, get_data_recov pada model manager 
5. Membuat halaman view v_kartu_debitur 
6. Membuat halaman list kelolaan
7. Membuat fungsi list_kelolaan, tampil_list_kelolaan pada controller manager
8. Membuat fungsi get_data_kelolaan, jumlah_semua_kelolaan, jumlah_filter_kelolaan pada model_manager 
9. Membuat halaman list prioritas  
10. Membuat fungsi pada controller manager:
-list_prioritas
-ambil_capem_ver
-tampil_list_tambah_prioritas
-tampil_list_prioritas
-form_tambah_prioritas
11. Membuat view halaman V_tambah_prioritas
12. Membuat fungsi pada model_manager 
-cari_cap_ver
-get_data_tambah_prioritas
-jumlah_semua_tambah_prioritas
-jumlah_filter_tambah_prioritas
-get_data_prioritas
-jumlah_semua_prioritas
-jumlah_filter_prioritas
-get_data_ver

Progress : 65%


