<?php

 class Guru_model
{
    private $table = 'masterguru';
    private $db;

    public function __construct()
    {
        $this->db = new Database(DB_MASTER);
    }

    public function getAllData()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        return $this->db->fetchAll();
    }

    public function getDataById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_guru = :id"); // : = menghindari sql injection
        $this->db->bind("id", $id);
        return $this->db->fetch();
    }

    public function tambahData($data)
    {
        $this->db->query(
            "INSERT INTO {$this->table}
                VALUES 
            (null, :nama_lengkap, :jenis_kelamin, :tempat_lahir, :tanggal_lahir, :alamat_lengkap, :pendidikan_terakhir, :jurusan_pendidikan_terakhir, :nomor_hp, :kategori, :mapel_yg_diampu, :kategori_mapel, :nip, :status_sertifikasi, :keahlian_ganda, :status_pernikahan, :foto)"
        );

        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomor_hp', $data['nomor_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('foto', $data['foto']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusData($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_guru = :id");
        $this->db->bind("id", $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $this->db->query(
            "UPDATE {$this->table}
                SET 
                nama_lengkap = :nama_lengkap,
                jenis_kelamin = :jenis_kelamin,
                tempat_lahir = :tempat_lahir,
                tanggal_lahir = :tanggal_lahir,
                alamat_lengkap = :alamat_lengkap,
                pendidikan_terakhir = :pendidikan_terakhir,
                jurusan_pendidikan_terakhir = :jurusan_pendidikan_terakhir,
                nomor_hp = :nomor_hp,
                kategori = :kategori,
                mapel_yg_diampu = :mapel_yg_diampu,
                kategori_mapel = :kategori_mapel,
                nip = :nip,
                status_sertifikasi = :status_sertifikasi,
                keahlian_ganda = :keahlian_ganda,
                status_pernikahan = :status_pernikahan,
                foto = :foto
            WHERE id_guru = :id"
        );
        
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('alamat_lengkap', $data['alamat_lengkap']);
        $this->db->bind('pendidikan_terakhir', $data['pendidikan_terakhir']);
        $this->db->bind('jurusan_pendidikan_terakhir', $data['jurusan_pendidikan_terakhir']);
        $this->db->bind('nomor_hp', $data['nomor_hp']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('mapel_yg_diampu', $data['mapel_yg_diampu']);
        $this->db->bind('kategori_mapel', $data['kategori_mapel']);
        $this->db->bind('nip', $data['nip']);
        $this->db->bind('status_sertifikasi', $data['status_sertifikasi']);
        $this->db->bind('keahlian_ganda', $data['keahlian_ganda']);
        $this->db->bind('status_pernikahan', $data['status_pernikahan']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('id', $data['id_guru']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariData()
    {
        $keyword = $_POST['keyword'];

        $this->db->query("SELECT * FROM {$this->table} WHERE nama_lengkap LIKE :keyword");
        $this->db->bind("keyword", "%$keyword%");
        return $this->db->fetchAll();
    }
}
