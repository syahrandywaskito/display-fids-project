@extends('layouts.app') 

@section('title') Departure Data @endsection 

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
          Data Jadwal Departure
        </span>
      </h2>
    </div>
  </header>

  <section class="mx-5 mt-10">
    @if ($message = Session::get('success'))
    <div class="text-green-600 my-2">
      <strong>{{ $message }}</strong>
    </div>
    @endif

    <!-- Modal toggle -->
    <button
      data-modal-target="crud-modal"
      data-modal-toggle="crud-modal"
      class="button-submit"
      type="button"
    >
      Tambah Data Departure
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900">
              Tambah Data Departure
            </h3>
            <button
              type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-toggle="crud-modal"
            >
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <form class="p-4 md:p-5" action="{{ route('departure.tambah') }}" method="POST">
            @csrf

            <div class="grid gap-4 mb-4 grid-cols-2">
              <div class="col-span-2">
                <label for="nama_maskapai" class="label-jadwal">Nama Maskapai</label>
                <input type="text" name="nama_maskapai" id="nama_maskapai" class="input-jadwal" required="" />
              </div>
              <div class="col-span-2 sm:col-span-1">
                <label for="id_penerbangan" class="label-jadwal">ID Penerbangan</label>
                <input type="text" name="id_penerbangan" id="id_penerbangan" class="input-jadwal" required="" />
              </div>
              <div class="col-span-2 sm:col-span-1">
                <label for="waktu" class="label-jadwal">Jam Keberangkatan</label>
                <input type="time" name="waktu" id="waktu" class="input-jadwal" required="" />
              </div>
              <div class="col-span-2">
                <label for="tujuan" class="label-jadwal">Tujuan</label>
                <input type="text" name="tujuan" id="tujuan" class="input-jadwal" required="" />
              </div>
            </div>
            <button type="submit" class="button-submit">
              <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
              </svg>
              Tambah
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="mx-5 mt-10">
    <div class="relative overflow-x-auto rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs uppercase bg-gray-200">
          <tr>
            <th scope="col" class="px-6 py-3">
              Airline
            </th>
            <th scope="col" class="px-6 py-3">
              Flight
            </th>
            <th scope="col" class="px-6 py-3">
              Destination
            </th>
            <th scope="col" class="px-6 py-3">
              Time
            </th>
            <th scope="col" class="px-6 py-3 text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($departures as $data)

          <tr class="bg-white border-b">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
              {{ $data['nama_maskapai'] }}
            </th>
            <td class="px-6 py-4">
              {{ $data['id_penerbangan'] }}
            </td>
            <td class="px-6 py-4">
              {{ $data['tujuan'] }}
            </td>
            <td class="px-6 py-4">
              @php $formattedTime = date('H:i', strtotime($data['waktu'])); echo $formattedTime; @endphp
            </td>
            <td class="px-6 py-4 flex space-x-5 items-center justify-center">
              <form action="{{route('departure.hapus', $data['id'])}}" method="post" onsubmit="return confirm ('hapus jadwal penerbangan {{ $data['id_penerbangan']}} ?')">
                @csrf @method('DELETE')
                <button type="submit" class="bg-red-600 text-gray-50 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3.5 py-2 text-center">Hapus</button>
              </form>
              {{-- <a
                id="edit-data"
                href="javascript:void(0);"
                data-modal-target="edit-modal"
                data-modal-toggle="edit-modal"
                data-id="{{ $data['id'] }}"
                class="editData block bg-gray-500 text-gray-50 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3.5 py-2 text-center"
              >
                Edit
              </a> --}}
              <a
                id="edit-data"
                href="{{ route('departure.edit', $data->id) }}"
                class="editData block bg-gray-500 text-gray-50 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3.5 py-2 text-center"
              >
                Edit
              </a>
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>

      {{-- <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900">
                Edit Data
              </h3>
              <button
                id="close-modal"
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-toggle="edit-modal"
              >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
              @csrf

              <input type="hidden" id="departure-id" />

              <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2">
                  <label for="update-nama-maskapai" class="block mb-2 text-sm font-medium text-gray-900">Nama Maskapai</label>
                  <input type="text" name="nama_maskapai" id="update-nama-maskapai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required />
                </div>
                <div class="col-span-2 sm:col-span-1">
                  <label for="update-id-penerbangan" class="block mb-2 text-sm font-medium text-gray-900">ID Penerbangan</label>
                  <input type="text" name="id_penerbangan" id="update-id-penerbangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required />
                </div>
                <div class="col-span-2 sm:col-span-1">
                  <label for="update-waktu" class="block mb-2 text-sm font-medium text-gray-900">Jam Keberangkatan</label>
                  <input type="time" name="waktu" id="update-waktu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required />
                </div>
                <div class="col-span-2">
                  <label for="update-tujuan" class="block mb-2 text-sm font-medium text-gray-900">Tujuan</label>
                  <input type="text" name="dari" id="update-tujuan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required />
                </div>
              </div>
              <button id="update" type="submit" class="flex bg-gray-500 text-gray-50 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Edit
              </button>
            </form>
          </div>
        </div>
      </div> --}}
    </div>
  </section>
</div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js "></script> --}}
{{-- <script>
  $("body").on("click", "#edit-data", function () {
    let departureId = $(this).data("id");

    $.ajax({
      url: `data/edit/${departureId}`,
      type: "GET",
      cache: false,
      success: function (response) {
        $("#departure-id").val(response.data.id);
        $("#update-nama-maskapai").val(response.data.nama_maskapai);
        $("#update-id-penerbangan").val(response.data.id_penerbangan);
        $("#update-waktu").val(response.data.waktu);
        $("#update-tujuan").val(response.data.tujuan);
      },
    });
  });

  $("#update").click(function (event) {
    event.preventDefault();

    let departureId = $("#departure-id").val();
    let namaMaskapai = $("#update-nama-maskapai").val();
    let idPenerbangan = $("#update-id-penerbangan").val();
    let waktu = $("#update-waktu").val();
    let tujuan = $("#update-tujuan").val();
    let token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
      url: "data/update/" + departureId,
      type: "PUT",
      cache: false,
      data: {
        nama_maskapai: namaMaskapai,
        id_penerbangan: idPenerbangan,
        waktu: waktu,
        tujuan: tujuan,
        _token: token,
      },
      success: function (response) {
        location.reload();
      },
      error: function (error) {
        console.error("Gagal memperbarui data", error);
      },
    });
  });
</script> --}}
@endsection
