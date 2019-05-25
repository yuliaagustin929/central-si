<div class="form-group">
    <label for="judul">judul</label>
    {{ Form::text('judul', null, ['class' => 'form-control', 'id' => 'judul', 'placeholder' => 'judul pengabdian']) }}
</div>

<div class="form-group">
    <label for="tahun">tahun</label>
    {{ Form::text('tahun', null, ['class' => 'form-control', 'id' => 'tahun', 'placeholder' => 'tahun']) }}
</div>

<div class="form-group">
    <label for="total_dana">total dana</label>
    {{ Form::text('total_dana', null, ['class' => 'form-control', 'id' => 'total_dana', 'placeholder' => 'total dana']) }}
</div>

<div class="form-group">
    <label for="skema_pengabdian_id">skema pengabdian</label>
    {{ Form::select('skema_pengabdian_id',$skema_pengabdian, null, ['class' => 'form-control', 'id' => 'skema_pengabdian_id', 'placeholder' => 'skema pengabdian']) }}
</div>

<div class="form-group">
    <label for="sumber_dana_id">sumber dana</label>
    {{ Form::select('sumber_dana_id', $sumber_dana,null, ['class' => 'form-control', 'id' => 'sumber_dana_id', 'placeholder' => 'sumber dana']) }}
</div> 

<div class="form-group">
    <label for="file_kontrak">file_kontrak</label>
    {{ Form::text('file_kontrak', null, ['class' => 'form-control', 'id' => 'file_kontrak', 'placeholder' => 'file kontrak']) }}
</div>

<div class="form-group">
    <label for="file_laporan">No. HP</label>
    {{ Form::text('file_laporan', null, ['class' => 'form-control', 'id' => 'file_laporan', 'placeholder' => 'file_laporan']) }}
</div>

