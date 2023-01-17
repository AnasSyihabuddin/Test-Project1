<div class="box box-info padding-1">
    <div class="box-body">
        


            <div class="form-row">
                {{ Form::label('Nama','Nama',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama', $pendaftaranSiswa->nama, ['class' => 'form-control' .
 ($errors->has('nama') ? ' is-invalid' : ''), 'placeholder' => 'Nama']) }}
                    {!! $errors->first('nama', '<div class="invalid-feedback">
                        :message</p>') !!}
                    </div>
                </div>

                <div class="form-row">
                    {{ Form::label('alamat','Alamat',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                    <div class="col-sm-9">
                        {{ Form::text('alamat', $pendaftaranSiswa->alamat, ['class' => 'form-control' .
 ($errors->has('alamat') ? ' is-invalid' : ''),
 'placeholder' => 'Alamat']) }}
                        {!! $errors->first('alamat',
                        '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-row">
                        {{ Form::label('tanggal_lahir','Tanggal Lahir',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                        <div class="col-sm-9">
                            {{ Form::date('tanggal_lahir', $pendaftaranSiswa->tanggal_lahir,
 ['class' => 'form-control' .
 ($errors->has('tanggal_lahir') ? ' is-invalid' : ''),
 'placeholder' => 'Alamat']) }}
                            {!! $errors->first('tanggal_lahir',
                            '<div class="invalid-feedback">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-row">
                            {{ Form::label('jenis_kelamin','Jenis Kelamin',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                            <div class="col-sm-9">
                                {!! Form::radio('jenis_kelamin','L',
                                $pendaftaranSiswa->jenis_kelamin=="L" ? true : false) !!} Laki-laki
                                {!! Form::radio('jenis_kelamin','P',
                                $pendaftaranSiswa->jenis_kelamin=="P" ? true : false) !!} Perempuan
                                {!! $errors->first('jenis_kelamin', '<div class="invalid-feedback">
                                    :message</define_syslog_variables>') !!}
                                </div>
                            </div>

                            <div class="form-row">
                    {{ Form::label('asal_sekolah','Asal Sekolah',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                    <div class="col-sm-9">
                        {{ Form::text('asal_sekolah', $pendaftaranSiswa->asal_sekolah, ['class' => 'form-control' .
 ($errors->has('asal_sekolah') ? ' is-invalid' : ''),
 'placeholder' => 'Asal Sekolah']) }}
                        {!! $errors->first('asal_sekolah',
                        '<div class="invalid-feedback">:message</p>') !!}
                        </div>
                    </div>

                            <div class="form-row">
                                {{ Form::label('agama_id','Agama',
 ['class' => 'col-sm-3 col-form-label','style'=>'font-weight:bold;']) }}
                                <div class="col-sm-9">
                                    {{ Form::select('agama_id',\App\Models\Pendaftaran::listAgama(),
 $pendaftaranSiswa->agama, ['no_pendaftaran'=>'agama_id','class' => 'form-control' .
 ($errors->has('agama_id') ? 'is-invalid' : ''),
 'placeholder' => '--- pilih ---']) }}
                                    {!! $errors->first('agama_id', '<div class="invalid-feedback">
                                        :message</div>') !!}
                                </div>
                            </div>

                            <div class="form-row">
                                {{ Form::label('nilai_ind','Nilai bhs Indonesia',['class' => 'col-sm-3 col-form-label',
 'style'=>'font-weight:bold;']) }}
                                <div class="col-sm-9">
                                    {{ Form::text('nilai_ind', $pendaftaranSiswa->nilai_ind, ['class' => 'form-control' .
 ($errors->has('nilai_ind') ? ' is-invalid' : ''),
 'placeholder' => 'Nilai']) }}
                                    {!! $errors->first('$nilai_ind', '<div class="invalid-feedback">
                                        :message</p>') !!}
                                    </div>
                                </div>

                                <div class="form-row">
                                    {{ Form::label('nilai_ipa','Nilai IPA',['class' => 'col-sm-3 col-form-label',
 'style'=>'font-weight:bold;']) }}
                                    <div class="col-sm-9">
                                        {{ Form::text('nilai_ipa', $pendaftaranSiswa->nilai_ipa, ['class' => 'form-control' .
 ($errors->has('nilai_ipa') ? ' is-invalid' : ''), 'placeholder' => 'Nilai']) }}
                                        {!! $errors->first('nilai_ipa',
                                        '<div class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>

                                    <div class="form-row">
                                    {{ Form::label('nilai_mtk','Nilai Matematika',['class' => 'col-sm-3 col-form-label',
 'style'=>'font-weight:bold;']) }}
                                    <div class="col-sm-9">
                                        {{ Form::text('nilai_mtk', $pendaftaranSiswa->nilai_mtk, ['class' => 'form-control' .
 ($errors->has('nilai_mtk') ? ' is-invalid' : ''), 'placeholder' => 'Nilai']) }}
                                        {!! $errors->first('nilai_mtk',
                                        '<div class="invalid-feedback">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>