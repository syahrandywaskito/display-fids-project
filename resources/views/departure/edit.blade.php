@extends('layouts.app') 

@section('title') Departure Data {{ $departure->id_penerbangan }} | {{ $departure->nama_maskapai }} @endsection 

@section('content') 

  @include('components.sidebar')

  <div class="p-4 sm:ml-64">

    <header class="mx-5 mt-5">
      <div class="w-full">
        <h2 class="uppercase font-medium text-lg flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
          </svg>

          <span>
            Edit Data Departure - {{ $departure->id_penerbangan }} | {{ $departure->nama_maskapai }}
          </span>
        </h2>
      </div>
    </header>

    <form class="p-4 md:p-5 mt-6" action="{{ route('departure.update', $departure->id) }}" method="POST">

      @csrf
      @method('PUT')

      <div class="grid gap-4 mb-4 grid-cols-2">
        <div class="col-span-2">
          <label for="nama_maskapai" class="label-jadwal">Nama Maskapai</label>
          <input type="text" name="nama_maskapai" id="nama_maskapai" class="input-jadwal" required value="{{ $departure->nama_maskapai }}" />
        </div>
        <div class="col-span-2 sm:col-span-1">
          <label for="id_penerbangan" class="label-jadwal">ID Penerbangan</label>
          <input type="text" name="id_penerbangan" id="id_penerbangan" class="input-jadwal" required value="{{ $departure->id_penerbangan }}" />
        </div>
        <div class="col-span-2 sm:col-span-1">
          <label for="waktu" class="label-jadwal">Jam Keberangkatan</label>
          <input type="time" name="waktu" id="waktu" class="input-jadwal" required value="{{ $departure->waktu }}"/>
        </div>
        <div class="col-span-2">
          <label for="tujuan" class="label-jadwal">Tujuan</label>
          <input type="text" name="tujuan" id="tujuan" class="input-jadwal" required value="{{ $departure->tujuan }}"/>
        </div>
      </div>
      <button type="submit" class="button-submit">
        Ubah
      </button>
    </form>

@endsection