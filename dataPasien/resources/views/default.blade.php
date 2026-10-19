@extends('template/main')
@section('main-content')
    <section id="main">
        <div class="animated flash">
            <fieldset>
                <legend>Pasien Baru</legend>
                <form action="{{url('/manage')}}" method="post">
                    @csrf
                    <div class="textbox">
                        <input type="text" name="nama" id="" placeholder="Masukkan nama" value="{{ ($data != null) ? $data->nama : '' }}">
                    </div>
                    <div class="textbox">
                        <input type="text" name="keluhan" id="" placeholder="Masukkan keluhan" value="{{ ($data != null) ? $data->keluhan : '' }}">
                    </div>
                    <input type="hidden" name="id" value="{{ ($data != null) ? $data->id : 0 }}">
                    <input class="button" type="submit" value="SAVE">
                </form>
            </fieldset>
            
            <fieldset>
                <legend>Data Pasien</legend>
                <table>
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="40%">Nama</th>
                            <th width="20%">Keluhan</th>
                            <th width="40%">Tanggal</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @if(isset($bankData))
                            @foreach($bankData as $default)
                            <?php $no++ ;?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$default->nama}}</td>
                                    <td>{{$default->keluhan}}</td>
                                    <td>{{$default->created_at}}</td>
                                    <td><a href='{{url("/edit/$default->id")}}'>Ubah</a></td>
                                    <td><a href='{{url("/delete/$default->id")}}'>Hapus</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </fieldset>
        </div>
    </section>
@endsection