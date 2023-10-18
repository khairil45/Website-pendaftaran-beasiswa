<div class="container">
    <h2 class="mb-4">Laporan</h2>
    
    <!-- Form Cetak Laporan -->
    <form class="w-25" action="cetak-laporan.php" method="post">
        <label for="beasiswa" class="form-label">Pilih Jenis Laporan :</label>
        <div class="mb-3 d-flex align-items-center">
            <select name="beasiswa" class="form-control" id="beasiswa">
                <option value="akademik">Akademik</option>
                <option value="non-akademik">Non Akademik</option>
            </select>
            <button type="submit" class="border-0 bg-body ms-2">
                <i class="fa-solid fa-print text-dark fs-2"></i>
            </button>
        </div>
    </form>
</div>