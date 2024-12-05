<div class="modal fade" id="createKpiModal" tabindex="-1" role="dialog" aria-labelledby="createKpiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createKpiModalLabel">Tambah KPI Baru untuk Divisi: {{ $divisi->nama }} di Departemen: {{ $departemen->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kpi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="departemen_id" value="{{ $departemen->id }}">
                    <input type="hidden" name="divisi_id" value="{{ $divisi->id }}">
                    <div class="form-group">
                        <label for="simbol">Simbol</label>
                        <input type="text" class="form-control" id="simbol" name="simbol" required>
                    </div>
                    <div class="form-group">
                        <label for="kriteria">Kriteria</label>
                        <input type="text" class="form-control" id="kriteria" name="kriteria" required>
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot</label>
                        <input type="number" class="form-control" id="bobot" name="bobot" required min="0" max="100">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4>Terjadi Kesalahan:</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <p>Silakan periksa kembali data yang Anda masukkan dan coba lagi.</p>
                </div>
            @endif
        </div>
    </div>
</div>
