<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\NaiveBayesHelpers;
use App\Helpers\SosmedHelpers;
use App\Helpers\KeuntunganHelpers;
use App\Helpers\PengaruhEventHelpers;
use App\Helpers\KenaikanKeuntunganHelpers;
use App\Helpers\ProdukHelpers;
use App\Helpers\WaktuHelpers;
use Illuminate\Support\Facades\DB;

class PrediksiController extends Controller
{
    public function index()
    {
        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');

        $facebookData = NaiveBayesHelpers::getfacebook('kelas');
        $tiktokData = NaiveBayesHelpers::getTiktok('kelas');
        $instagramData = NaiveBayesHelpers::getinstagram('kelas');

        $facebookDataTB = SosmedHelpers::getfacebook('kelas');
        $tiktokDataTB = SosmedHelpers::getTiktok('kelas');
        $instagramDataTB = SosmedHelpers::getinstagram('kelas');

        $keuntunganSatuB = KeuntunganHelpers::getKeuntunganSatu('kelas');
        $keuntunganDuaB = KeuntunganHelpers::getKeuntunganDua('kelas');
        $keuntunganTigaB = KeuntunganHelpers::getKeuntunganTiga('kelas');

        $keuntunganSatuTB = KeuntunganHelpers::getKeuntunganSatuTB('kelas');
        $keuntunganDuaTB = KeuntunganHelpers::getKeuntunganDuaTB('kelas');
        $keuntunganTigaTB = KeuntunganHelpers::getKeuntunganTigaTB('kelas');

        $pengaruhEventSatuB = PengaruhEventHelpers::getPengaruhEventSatu('kelas');
        $pengaruhEventDuaB = PengaruhEventHelpers::getPengaruhEventDua('kelas');

        $pengaruhEventSatuTB = PengaruhEventHelpers::getPengaruhEventSatuTB('kelas');
        $pengaruhEventDuaTB = PengaruhEventHelpers::getPengaruhEventDuaTB('kelas');

        $kenaikanKeuntunganSatuB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatu('kelas');
        $kenaikanKeuntunganDuaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDua('kelas');
        $kenaikanKeuntunganTigaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTiga('kelas');

        $kenaikanKeuntunganSatuTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatuTB('kelas');
        $kenaikanKeuntunganDuaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDuaTB('kelas');
        $kenaikanKeuntunganTigaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTigaTB('kelas');

        $produkSatuB = ProdukHelpers::getProdukSatu('kelas');
        $produkDuaB = ProdukHelpers::getProdukDua('kelas');
        $produkTigaB = ProdukHelpers::getProdukTiga('kelas');

        $produkSatuTB = ProdukHelpers::getProdukSatuTB('kelas');
        $produkDuaTB = ProdukHelpers::getProdukDuaTB('kelas');
        $produkTigaTB = ProdukHelpers::getProdukTigaTB('kelas');

        $waktuSatuB = WaktuHelpers::getWaktuSatu('kelas');
        $waktuDuaB = WaktuHelpers::getWaktuDua('kelas');
        $waktuTigaB = WaktuHelpers::getWaktuTiga('kelas');

        $waktuSatuTB = WaktuHelpers::getWaktuSatuTB('kelas');
        $waktuDuaTB = WaktuHelpers::getWaktuDuaTB('kelas');
        $waktuTigaTB = WaktuHelpers::getWaktuTigaTB('kelas');

        return view('admin.prediksi.index', compact(
            'probabilitasBerpengaruh',
            'probabilitasTidakBerpengaruh',
            'facebookData',
            'tiktokData',
            'instagramData',
            'facebookDataTB',
            'tiktokDataTB',
            'instagramDataTB',
            'keuntunganSatuB',
            'keuntunganDuaB',
            'keuntunganTigaB',
            'keuntunganSatuTB',
            'keuntunganDuaTB',
            'keuntunganTigaTB',
            'pengaruhEventSatuB',
            'pengaruhEventDuaB',
            'pengaruhEventSatuTB',
            'pengaruhEventDuaTB',
            'kenaikanKeuntunganSatuB',
            'kenaikanKeuntunganDuaB',
            'kenaikanKeuntunganTigaB',
            'kenaikanKeuntunganSatuTB',
            'kenaikanKeuntunganDuaTB',
            'kenaikanKeuntunganTigaTB',
            'produkSatuB',
            'produkDuaB',
            'produkTigaB',
            'produkSatuTB',
            'produkDuaTB',
            'produkTigaTB',
            'waktuSatuB',
            'waktuDuaB',
            'waktuTigaB',
            'waktuSatuTB',
            'waktuDuaTB',
            'waktuTigaTB',
        ));
    }

    public function store()
    {
        // Mengambil id_prediksi terakhir dan menambahkan 1
        $lastPrediksiId = DB::table('sosmed')->max('id_prediksi'); // Ganti 'nama_tabel_prediksi' dengan nama tabel yang sesuai
        $newPrediksiId = $lastPrediksiId + 1;

        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');

        $facebookData = NaiveBayesHelpers::getfacebook('kelas');
        $tiktokData = NaiveBayesHelpers::getTiktok('kelas');
        $instagramData = NaiveBayesHelpers::getinstagram('kelas');

        $facebookDataTB = SosmedHelpers::getfacebook('kelas');
        $tiktokDataTB = SosmedHelpers::getTiktok('kelas');
        $instagramDataTB = SosmedHelpers::getinstagram('kelas');

        $keuntunganSatuB = KeuntunganHelpers::getKeuntunganSatu('kelas');
        $keuntunganDuaB = KeuntunganHelpers::getKeuntunganDua('kelas');
        $keuntunganTigaB = KeuntunganHelpers::getKeuntunganTiga('kelas');

        $keuntunganSatuTB = KeuntunganHelpers::getKeuntunganSatuTB('kelas');
        $keuntunganDuaTB = KeuntunganHelpers::getKeuntunganDuaTB('kelas');
        $keuntunganTigaTB = KeuntunganHelpers::getKeuntunganTigaTB('kelas');

        $pengaruhEventSatuB = PengaruhEventHelpers::getPengaruhEventSatu('kelas');
        $pengaruhEventDuaB = PengaruhEventHelpers::getPengaruhEventDua('kelas');

        $pengaruhEventSatuTB = PengaruhEventHelpers::getPengaruhEventSatuTB('kelas');
        $pengaruhEventDuaTB = PengaruhEventHelpers::getPengaruhEventDuaTB('kelas');

        $kenaikanKeuntunganSatuB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatu('kelas');
        $kenaikanKeuntunganDuaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDua('kelas');
        $kenaikanKeuntunganTigaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTiga('kelas');

        $kenaikanKeuntunganSatuTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatuTB('kelas');
        $kenaikanKeuntunganDuaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDuaTB('kelas');
        $kenaikanKeuntunganTigaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTigaTB('kelas');

        $produkSatuB = ProdukHelpers::getProdukSatu('kelas');
        $produkDuaB = ProdukHelpers::getProdukDua('kelas');
        $produkTigaB = ProdukHelpers::getProdukTiga('kelas');

        $produkSatuTB = ProdukHelpers::getProdukSatuTB('kelas');
        $produkDuaTB = ProdukHelpers::getProdukDuaTB('kelas');
        $produkTigaTB = ProdukHelpers::getProdukTigaTB('kelas');

        $waktuSatuB = WaktuHelpers::getWaktuSatu('kelas');
        $waktuDuaB = WaktuHelpers::getWaktuDua('kelas');
        $waktuTigaB = WaktuHelpers::getWaktuTiga('kelas');

        $waktuSatuTB = WaktuHelpers::getWaktuSatuTB('kelas');
        $waktuDuaTB = WaktuHelpers::getWaktuDuaTB('kelas');
        $waktuTigaTB = WaktuHelpers::getWaktuTigaTB('kelas');

        $dataprediksi = [
            'id_sosmed' => $newPrediksiId,
            'id_keuntungan' => $newPrediksiId,
            'id_pengaruh_event' => $newPrediksiId,
            'id_kenaikan_keuntungan' => $newPrediksiId,
            'id_produk' => $newPrediksiId,
            'id_waktu' => $newPrediksiId,
            'id_kelas' => $newPrediksiId,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $dataKelas = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'B',
                'nilai' =>  $probabilitasBerpengaruh,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'TB',
                'nilai' =>  $probabilitasTidakBerpengaruh,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataSosmed = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Instagram',
                'b' =>  $instagramData,
                'tb' =>  $instagramDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Facebook',
                'b' => $facebookData,
                'tb' => $facebookDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Tiktok',
                'b' => $tiktokData,
                'tb' => $tiktokDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataKeuntungan = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 1.000.000',
                'b' =>  $keuntunganSatuB,
                'tb' =>  $keuntunganSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 500.000',
                'b' =>  $keuntunganDuaB,
                'tb' =>  $keuntunganDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Kurang dari Rp 500.000',
                'b' =>  $keuntunganTigaB,
                'tb' =>  $keuntunganTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataPengaruhEvent = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'ya',
                'b' =>   $pengaruhEventSatuB,
                'tb' =>   $pengaruhEventSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'tidak',
                'b' =>   $pengaruhEventDuaB,
                'tb' =>   $pengaruhEventDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataKenaikanKeuntungan = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 200.000',
                'b' =>  $kenaikanKeuntunganSatuB,
                'tb' =>  $kenaikanKeuntunganSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 50.000',
                'b' =>  $kenaikanKeuntunganDuaB,
                'tb' =>  $kenaikanKeuntunganDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Kurang dari Rp 150.000',
                'b' =>  $kenaikanKeuntunganTigaB,
                'tb' =>  $kenaikanKeuntunganTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataProduk = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'FAF',
                'b' =>  $produkSatuB,
                'tb' =>  $produkSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'KPD',
                'b' =>  $produkDuaB,
                'tb' =>  $produkDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'PSH',
                'b' =>  $produkTigaB,
                'tb' =>  $produkTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataWaktu = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '1',
                'b' =>  $waktuSatuB,
                'tb' =>   $waktuSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '2',
                'b' =>   $waktuDuaB,
                'tb' =>   $waktuDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '3',
                'b' =>   $waktuTigaB,
                'tb' =>   $waktuTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('sosmed')->insert($dataSosmed);
        DB::table('hasil_prediksi')->insert($dataprediksi);
        DB::table('keuntungan')->insert($dataKeuntungan);
        DB::table('pengaruh_event')->insert($dataPengaruhEvent);
        DB::table('kenaikan_keuntungan')->insert($dataKenaikanKeuntungan);
        DB::table('produk')->insert($dataProduk);
        DB::table('waktu')->insert($dataWaktu);
        DB::table('kelas')->insert($dataKelas);

        return redirect()->route('prediksi')->with('success', 'Data berhasil disimpan');
    }

    public function index_aff()
    {
        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');

        $facebookData = NaiveBayesHelpers::getfacebook('kelas');
        $tiktokData = NaiveBayesHelpers::getTiktok('kelas');
        $instagramData = NaiveBayesHelpers::getinstagram('kelas');

        $facebookDataTB = SosmedHelpers::getfacebook('kelas');
        $tiktokDataTB = SosmedHelpers::getTiktok('kelas');
        $instagramDataTB = SosmedHelpers::getinstagram('kelas');

        $keuntunganSatuB = KeuntunganHelpers::getKeuntunganSatu('kelas');
        $keuntunganDuaB = KeuntunganHelpers::getKeuntunganDua('kelas');
        $keuntunganTigaB = KeuntunganHelpers::getKeuntunganTiga('kelas');

        $keuntunganSatuTB = KeuntunganHelpers::getKeuntunganSatuTB('kelas');
        $keuntunganDuaTB = KeuntunganHelpers::getKeuntunganDuaTB('kelas');
        $keuntunganTigaTB = KeuntunganHelpers::getKeuntunganTigaTB('kelas');

        $pengaruhEventSatuB = PengaruhEventHelpers::getPengaruhEventSatu('kelas');
        $pengaruhEventDuaB = PengaruhEventHelpers::getPengaruhEventDua('kelas');

        $pengaruhEventSatuTB = PengaruhEventHelpers::getPengaruhEventSatuTB('kelas');
        $pengaruhEventDuaTB = PengaruhEventHelpers::getPengaruhEventDuaTB('kelas');

        $kenaikanKeuntunganSatuB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatu('kelas');
        $kenaikanKeuntunganDuaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDua('kelas');
        $kenaikanKeuntunganTigaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTiga('kelas');

        $kenaikanKeuntunganSatuTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatuTB('kelas');
        $kenaikanKeuntunganDuaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDuaTB('kelas');
        $kenaikanKeuntunganTigaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTigaTB('kelas');

        $produkSatuB = ProdukHelpers::getProdukSatu('kelas');
        $produkDuaB = ProdukHelpers::getProdukDua('kelas');
        $produkTigaB = ProdukHelpers::getProdukTiga('kelas');

        $produkSatuTB = ProdukHelpers::getProdukSatuTB('kelas');
        $produkDuaTB = ProdukHelpers::getProdukDuaTB('kelas');
        $produkTigaTB = ProdukHelpers::getProdukTigaTB('kelas');

        $waktuSatuB = WaktuHelpers::getWaktuSatu('kelas');
        $waktuDuaB = WaktuHelpers::getWaktuDua('kelas');
        $waktuTigaB = WaktuHelpers::getWaktuTiga('kelas');

        $waktuSatuTB = WaktuHelpers::getWaktuSatuTB('kelas');
        $waktuDuaTB = WaktuHelpers::getWaktuDuaTB('kelas');
        $waktuTigaTB = WaktuHelpers::getWaktuTigaTB('kelas');

        return view('affiliate.prediksi.index', compact(
            'probabilitasBerpengaruh',
            'probabilitasTidakBerpengaruh',
            'facebookData',
            'tiktokData',
            'instagramData',
            'facebookDataTB',
            'tiktokDataTB',
            'instagramDataTB',
            'keuntunganSatuB',
            'keuntunganDuaB',
            'keuntunganTigaB',
            'keuntunganSatuTB',
            'keuntunganDuaTB',
            'keuntunganTigaTB',
            'pengaruhEventSatuB',
            'pengaruhEventDuaB',
            'pengaruhEventSatuTB',
            'pengaruhEventDuaTB',
            'kenaikanKeuntunganSatuB',
            'kenaikanKeuntunganDuaB',
            'kenaikanKeuntunganTigaB',
            'kenaikanKeuntunganSatuTB',
            'kenaikanKeuntunganDuaTB',
            'kenaikanKeuntunganTigaTB',
            'produkSatuB',
            'produkDuaB',
            'produkTigaB',
            'produkSatuTB',
            'produkDuaTB',
            'produkTigaTB',
            'waktuSatuB',
            'waktuDuaB',
            'waktuTigaB',
            'waktuSatuTB',
            'waktuDuaTB',
            'waktuTigaTB',
        ));
    }

    public function store_aff()
    {
        // Mengambil id_prediksi terakhir dan menambahkan 1
        $lastPrediksiId = DB::table('sosmed')->max('id_prediksi'); // Ganti 'nama_tabel_prediksi' dengan nama tabel yang sesuai
        $newPrediksiId = $lastPrediksiId + 1;

        $probabilitasBerpengaruh = NaiveBayesHelpers::getBerpengaruh('kelas');
        $probabilitasTidakBerpengaruh = NaiveBayesHelpers::getTidakBerpengaruh('kelas');

        $facebookData = NaiveBayesHelpers::getfacebook('kelas');
        $tiktokData = NaiveBayesHelpers::getTiktok('kelas');
        $instagramData = NaiveBayesHelpers::getinstagram('kelas');

        $facebookDataTB = SosmedHelpers::getfacebook('kelas');
        $tiktokDataTB = SosmedHelpers::getTiktok('kelas');
        $instagramDataTB = SosmedHelpers::getinstagram('kelas');

        $keuntunganSatuB = KeuntunganHelpers::getKeuntunganSatu('kelas');
        $keuntunganDuaB = KeuntunganHelpers::getKeuntunganDua('kelas');
        $keuntunganTigaB = KeuntunganHelpers::getKeuntunganTiga('kelas');

        $keuntunganSatuTB = KeuntunganHelpers::getKeuntunganSatuTB('kelas');
        $keuntunganDuaTB = KeuntunganHelpers::getKeuntunganDuaTB('kelas');
        $keuntunganTigaTB = KeuntunganHelpers::getKeuntunganTigaTB('kelas');

        $pengaruhEventSatuB = PengaruhEventHelpers::getPengaruhEventSatu('kelas');
        $pengaruhEventDuaB = PengaruhEventHelpers::getPengaruhEventDua('kelas');

        $pengaruhEventSatuTB = PengaruhEventHelpers::getPengaruhEventSatuTB('kelas');
        $pengaruhEventDuaTB = PengaruhEventHelpers::getPengaruhEventDuaTB('kelas');

        $kenaikanKeuntunganSatuB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatu('kelas');
        $kenaikanKeuntunganDuaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDua('kelas');
        $kenaikanKeuntunganTigaB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTiga('kelas');

        $kenaikanKeuntunganSatuTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganSatuTB('kelas');
        $kenaikanKeuntunganDuaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganDuaTB('kelas');
        $kenaikanKeuntunganTigaTB = KenaikanKeuntunganHelpers::getKenaikanKeuntunganTigaTB('kelas');

        $produkSatuB = ProdukHelpers::getProdukSatu('kelas');
        $produkDuaB = ProdukHelpers::getProdukDua('kelas');
        $produkTigaB = ProdukHelpers::getProdukTiga('kelas');

        $produkSatuTB = ProdukHelpers::getProdukSatuTB('kelas');
        $produkDuaTB = ProdukHelpers::getProdukDuaTB('kelas');
        $produkTigaTB = ProdukHelpers::getProdukTigaTB('kelas');

        $waktuSatuB = WaktuHelpers::getWaktuSatu('kelas');
        $waktuDuaB = WaktuHelpers::getWaktuDua('kelas');
        $waktuTigaB = WaktuHelpers::getWaktuTiga('kelas');

        $waktuSatuTB = WaktuHelpers::getWaktuSatuTB('kelas');
        $waktuDuaTB = WaktuHelpers::getWaktuDuaTB('kelas');
        $waktuTigaTB = WaktuHelpers::getWaktuTigaTB('kelas');

        $dataprediksi = [
            'id_sosmed' => $newPrediksiId,
            'id_keuntungan' => $newPrediksiId,
            'id_pengaruh_event' => $newPrediksiId,
            'id_kenaikan_keuntungan' => $newPrediksiId,
            'id_produk' => $newPrediksiId,
            'id_waktu' => $newPrediksiId,
            'id_kelas' => $newPrediksiId,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $dataKelas = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'B',
                'nilai' =>  $probabilitasBerpengaruh,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'TB',
                'nilai' =>  $probabilitasTidakBerpengaruh,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataSosmed = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Instagram',
                'b' =>  $instagramData,
                'tb' =>  $instagramDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Facebook',
                'b' => $facebookData,
                'tb' => $facebookDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Tiktok',
                'b' => $tiktokData,
                'tb' => $tiktokDataTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataKeuntungan = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 1.000.000',
                'b' =>  $keuntunganSatuB,
                'tb' =>  $keuntunganSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 500.000',
                'b' =>  $keuntunganDuaB,
                'tb' =>  $keuntunganDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Kurang dari Rp 500.000',
                'b' =>  $keuntunganTigaB,
                'tb' =>  $keuntunganTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataPengaruhEvent = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'ya',
                'b' =>   $pengaruhEventSatuB,
                'tb' =>   $pengaruhEventSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'tidak',
                'b' =>   $pengaruhEventDuaB,
                'tb' =>   $pengaruhEventDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataKenaikanKeuntungan = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 200.000',
                'b' =>  $kenaikanKeuntunganSatuB,
                'tb' =>  $kenaikanKeuntunganSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Lebih dari Rp 50.000',
                'b' =>  $kenaikanKeuntunganDuaB,
                'tb' =>  $kenaikanKeuntunganDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'Kurang dari Rp 150.000',
                'b' =>  $kenaikanKeuntunganTigaB,
                'tb' =>  $kenaikanKeuntunganTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataProduk = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'FAF',
                'b' =>  $produkSatuB,
                'tb' =>  $produkSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'KPD',
                'b' =>  $produkDuaB,
                'tb' =>  $produkDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => 'PSH',
                'b' =>  $produkTigaB,
                'tb' =>  $produkTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $dataWaktu = [
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '1',
                'b' =>  $waktuSatuB,
                'tb' =>   $waktuSatuTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '2',
                'b' =>   $waktuDuaB,
                'tb' =>   $waktuDuaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_prediksi' => $newPrediksiId,
                'nama' => '3',
                'b' =>   $waktuTigaB,
                'tb' =>   $waktuTigaTB,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('sosmed')->insert($dataSosmed);
        DB::table('hasil_prediksi')->insert($dataprediksi);
        DB::table('keuntungan')->insert($dataKeuntungan);
        DB::table('pengaruh_event')->insert($dataPengaruhEvent);
        DB::table('kenaikan_keuntungan')->insert($dataKenaikanKeuntungan);
        DB::table('produk')->insert($dataProduk);
        DB::table('waktu')->insert($dataWaktu);
        DB::table('kelas')->insert($dataKelas);

        return redirect()->route('prediksi_aff')->with('success', 'Data berhasil disimpan');
    }
}
