let page = 1;
let id = 0;
let keyword = "";
$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// keyword di ketik

	$(document).on("keyup", "#keyword", function () {
		page = 1;
		keyword = $("#keyword").val();
		loadDataSiswa();
	});

	// view
	$("#siswa").on("click", ".page", function () {
		page = $(this).data("page");
		loadDataSiswa();
	});
	$("#siswa").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusData();
	});
	$("#siswa").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	loadDataSiswa();

	// tombol simpan
	$("#simpanSiswa").click(() => {
		$.ajax({
			url: base_url + "siswa/simpan",
			type: "POST",
			data: $("#modal-input form").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataSiswa();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol edit
	$("#editSiswa").click(() => {
		$.ajax({
			url: base_url + "siswa/edit/" + id,
			type: "POST",
			data: $("#modal-input form").serialize(), //ambil semua data dari form
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataSiswa();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// get data
	function loadDataSiswa() {
		$.ajax({
			url: base_url + `siswa/getData?page=${page}&q=${keyword}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#siswa").html(response.html);
				} else {
					Toast.fire({
						icon: "error",
						title: response.pesan,
					});
				}
			},
		});
	}

	// tombol hapus
	function hapusData() {
		$.ajax({
			url: base_url + "siswa/delete/" + id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadDataSiswa();
					$("#modal-input").modal("hide");
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambahSiswa").on("click", function () {
		$(".modal-title").html("Tambah");
		$("#simpanSiswa").show();
		$("#editSiswa").hide();
		$("#nis").val("");
		$("#nama").val("");
		$("#kelas").val("");
		$("#email").val("example@email.com");
	});
	$("#siswa").on("click", ".editSiswa", function () {
		$(".modal-title").html("Edit");
		$("#simpanSiswa").hide();
		$("#editSiswa").show();

		$.ajax({
			url: "siswa/tampiledit/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#nis").val(data.nis);
				$("#nama").val(data.nama);
				$("#kelas").val(data.id_kelas);
				$("#email").val(data.email);
				$("#id").val(data.id);
			},
		});
	});
});
