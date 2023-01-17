<div class="box box-info padding-1">
    <div class="box-body">
   
    <div class="form-group">
        {{ Form::label('nama') }}
        {{ Form::text('nama', $data_Online->nama,
        ['class' => 'form-control' .
        ($errors->has('nama') ? ' is-invalid' : ''),
        'placeholder' => 'Nama']) }}
        {!! $errors->first('nama',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-group">
        {{ Form::label('alamat') }}
        {{ Form::text('alamat', $data_Online->alamat,
        ['class' => 'form-control' .
        ($errors->has('alamat') ? ' is-invalid' : ''),
        'placeholder' => 'Alamat']) }}
        {!! $errors->first('alamat',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-row">
        {{ Form::label('tanggal_lahir','Tanggal Lahir',
        ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
        <div class="col-sm-9">
            {{ Form::date('tanggal_lahir', $data_Online->tanggal_lahir,
            ['class' => 'form-control' .
            ($errors->has('tanggal_lahir') ? ' is-invalid' : ''),
            'placeholder' => 'Tanggal Lahir']) }}
            {!! $errors->first('tanggal_lahir',
            '<div class="invalid-feedback">:message</p>') !!}
        </div>
    </div>

    <div class="form-row">
        {{ Form::label('jenis_kelamin','Jenis Kelamin',
        ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
        <div class="col-sm-9">
            {!! Form::radio('jenis_kelamin','L',
            $data_Online->jenis_kelamin=="L" ? true : false) !!} Laki-laki
            {!! Form::radio('jenis_kelamin','P',
            $data_Online->jenis_kelamin=="P" ? true : false) !!} Perempuan
            {!! $errors->first('jenis_kelamin', '<div class="invalid-feedback">
            :message</define_syslog_variables>') !!}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('asal_sekolah') }}
        {{ Form::text('asal_sekolah', $data_Online->asal_sekolah,
        ['class' => 'form-control' .
        ($errors->has('asal_sekolah') ? ' is-invalid' : ''),
        'placeholder' => 'Asal Sekolah']) }}
        {!! $errors->first('asal_sekolah',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-row">
        {{ Form::label('agama','Agama',
        ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
        <div class="col-sm-9">
            {{ Form::select('agama',\App\Models\DataOnline::listAgama(),
            $data_Online->agama_id, ['id'=>'agama','class' => 'form-control' .
            ($errors->has('agama') ? 'is-invalid' : ''),
            'placeholder' => '--- pilih ---']) }}
            {!! $errors->first('agama', '<div class="invalid-feedback">
            :message</div>') !!}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('nilai B.Indo') }}
        {{ Form::text('nilai_ind', $data_Online->nilai_ind,
        ['class' => 'form-control' . ($errors->has('nilai_ind') ? '
        is-invalid' : ''), 'placeholder' => 'Nilai']) }}
        {!! $errors->first('nilai_ind',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-group">
        {{ Form::label('nilai IPA') }}
        {{ Form::text('nilai_ipa', $data_Online->nilai_ipa,
        ['class' => 'form-control' . ($errors->has('nilai_ipa') ? '
        is-invalid' : ''), 'placeholder' => 'Nilai']) }}
        {!! $errors->first('nilai_ipa',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>

    <div class="form-group">
        {{ Form::label('Nilai MTK') }}
        {{ Form::text('nilai_mtk', $data_Online->nilai_mtk,
        ['class' => 'form-control' . ($errors->has('nilai_mtk') ? '
        is-invalid' : ''), 'placeholder' => 'Nilai']) }}
        {!! $errors->first('nilai_mtk',
        '<div class="invalid-feedback">:message</p>') !!}
    </div>
       

    </div>
    <div class="box-footer mt20">
    <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </div>