let page = 1;
let id = 0;
$(document).ready(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// view
	$("#view").on("click", ".page", function () {
		page = $(this).data("page");
		loadData();
	});
	$("#view").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusData();
	});
	$("#view").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	loadData();

	// tombol simpan
	$("#simpanTugas").click(() => {
		$.ajax({
			url: base_url + "tugas/simpan",
			type: "POST",
			data: $("#modal-input form").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				// console.log(response);

				if (response.status == "sukses") {
					loadData();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
					window.location.href =
						base_url + "tugas/tambahisi?tugasid=" + response.result;
					localStorage.setItem("tugasid", response.result);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol edit
	$("#editTugas").click(() => {
		doEdit();
	});

	function doEdit() {
		$.ajax({
			url: base_url + "tugas/edit/",
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
					loadData();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi
	$("#isi").click(() => {
		doEdit();
	});

	// get data
	function loadData() {
		$.ajax({
			url: base_url + "tugas/getData?page=" + page,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#view").html(response.html);
					Toast.fire({
						icon: "success",
						title: response.pesan,
					});
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
			url: base_url + "tugas/delete/" + id,
			type: "DELETE",
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					$("#modal-input").modal("hide");
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambahTugas").click(function () {
		$(".modal-title").html("Tambah Tugas");
		$("#simpanTugas").show();
		$("#editTugas").hide();
		$("#isi").hide();
		$("#mapel").val("");
		$("#kelas").val("");
		$("#type").val("");
		$("#batas").val("");
	});
	$("#view").on("click", "#edit", function () {
		$(".modal-title").html("Edit Tugas");
		$("#simpanTugas").hide();
		$("#editTugas").show();
		$("#isi").show();

		$.ajax({
			url: base_url + "tugas/tampiledit/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#mapel").val(data.id_mapel);
				$("#kelas").val(data.id_kelas);
				$("#type").val(data.type);
				$("#batas").val(data.batas_waktu);
				$("#id").val(data.id);
				$("#isi").attr("href", base_url + "tugas/tambahisi?tugasid=" + data.id);
				localStorage.setItem("tugasid", data.id);
			},
			error: (err) => {
				console.log(err);
			},
		});
	});
});
