<div class="modal fade" id="editKpiModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editKpiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editKpiModalLabel">Edit KPI untuk Divisi: {{ $divisi->nama }} di Departemen: {{ $departemen->nama }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('kpi.update', $item->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="departemen_id" value="{{ $departemen->id }}">
          <input type="hidden" name="divisi_id" value="{{ $divisi->id }}">
          <div class="form-group">
            <label for="simbol">Simbol</label>
            <input type="text" class="form-control" id="simbol" name="simbol" value="{{ $item->simbol }}" required>
          </div>
          <div class="form-group">
            <label for="kriteria">Kriteria</label>
            <input type="text" class="form-control" id="kriteria" name="kriteria" value="{{ $item->kriteria }}" required>
          </div>
          <div class="form-group">
            <label for="bobot">Bobot</label>
            <input type="number" class="form-control" id="bobot" name="bobot" min="0" max="100" value="{{ $item->bobot }}" required>
          </div>
          {{-- <div class="form-group">
            <label for="atribut">Atribut</label>
            <input type="text" class="form-control" id="atribut" name="atribut" value="{{ $item->atribut }}" >
          </div> --}}
          {{-- <div class="form-group">
            <label for="divisi_id">Divisi</label>
            <select class="form-control" id="divisi_id" name="divisi_id" required>
              @foreach($divisiList as $divisi)
                <option value="{{ $divisi->id }}" {{ $item->divisi_id == $divisi->id ? 'selected' : '' }}>
                  {{ $divisi->nama }}
                </option>
              @endforeach
            </select>
          </div> --}}
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
