let page = 1;
let id = 0;
const tugasid = localStorage.getItem("tugasid");
$(document).ready(function () {
	// console.log("Costom");

	const Toast = Swal.mixin({
		toast: true,
		position: "top-end",
		showConfirmButton: false,
		timer: 3000,
	});

	// view
	$("#esay").on("click", ".page", function () {
		page = $(this).data("page");
		loadData();
	});
	$("#esay").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusData();
	});
	$("#esay").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	//  view pg
	$("#pg").on("click", ".page", function () {
		page = $(this).data("page");
		loadData();
	});
	$("#pg").on("click", "#hapus", function () {
		id = $(this).data("id");
		hapusPg();
	});
	$("#pg").on("click", "#edit", function () {
		id = $(this).data("id");
	});
	loadData();

	// crud
	// tombol simpan
	$("#simpanEsay").click(() => {
		$.ajax({
			url: base_url + "tugas/simpanEsay/" + tugasid,
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
					loadData();
					$("#modal-input").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// simpan pg
	$("#simpanPg").click(() => {
		$.ajax({
			url: base_url + "tugas/simpanPg/" + tugasid,
			type: "POST",
			data: $("#modal-pg form").serialize(),
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					$("#modal-pg").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol edit
	$("#editEsay").click(() => {
		$.ajax({
			url: base_url + "tugas/editEsay/",
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
	});

	// edit pg
	$("#editPg").click(() => {
		$.ajax({
			url: base_url + "tugas/editPg/",
			type: "POST",
			data: $("#modal-pg form").serialize(), //ambil semua data dari form
			dataType: "json",
			beforeSend: function (e) {
				if (e && e.overrideMimeType) {
					e.overrideMimeType("application/jsoncharset=UTF-8");
				}
			},
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					$("#modal-pg").modal("hide");
					toastr.success(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	});

	// tombol hapus
	function hapusData() {
		$.ajax({
			url: base_url + "tugas/deleteEsay/" + id,
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
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// hapus pg
	function hapusPg() {
		$.ajax({
			url: base_url + "tugas/deletePg/" + id,
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
					toastr.warning(response.pesan);
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// edit status
	$(document).on("click", "#tugasPublish", function () {
		console.log("Publish");
		const status = { status: "publish" };
		editStatus();
	});

	function editStatus() {
		$.ajax({
			url: base_url + "tugas/editStatus/" + tugasid,
			type: "POST",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					loadData();
					toastr.success(response.pesan);
					window.location.href = base_url + "tugas";
				} else {
					toastr.error(response.pesan);
				}
			},
		});
	}

	// isi modal
	$(".tambahEsay").click(function () {
		$(".modal-title").html("Tambah Esay");
		$("#simpanEsay").show();
		$("#editEsay").hide();
		$("#isi").hide();
		$("#soal").val("");
	});
	$("#esay").on("click", "#edit", function () {
		$(".modal-title").html("Edit Esay");
		$("#simpanEsay").hide();
		$("#editEsay").show();
		$("#isi").show();

		$.ajax({
			url: base_url + "tugas/tampileditEsay/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#soal").val(data.soal);
				$("#id").val(data.id);
			},
			error: (err) => {
				console.log(err);
			},
		});
	});

	// modal pg
	$(".tambahPg").click(function () {
		$(".modal-title").html("Tambah Pilihan Ganda");
		$("#simpanPg").show();
		$("#editPg").hide();
		$("#soalpg").val("");
		$("#a").val("");
		$("#b").val("");
		$("#c").val("");
		$("#d").val("");
		$("#e").val("");
		$("#benar").val("");
	});
	$("#pg").on("click", "#edit", function () {
		$(".modal-title").html("Edit Pilihan Ganda");
		$("#simpanPg").hide();
		$("#editPg").show();

		$.ajax({
			url: base_url + "tugas/tampileditPg/" + id,
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#soalpg").val(data.soal);
				$("#idpg").val(data.id);
				$("#a").val(data.A);
				$("#b").val(data.B);
				$("#c").val(data.C);
				$("#d").val(data.D);
				$("#e").val(data.E);
				$("#benar").val(data.benar);
			},
			error: (err) => {
				console.log(err);
			},
		});
	});
	// crud end

	// isi dari tugas
	function loadData() {
		$.ajax({
			url: base_url + `tugas/getEsay/${tugasid}?page=${page}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#esay").html(response.html);
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
		$.ajax({
			url: base_url + `tugas/getPg/${tugasid}?page=${page}`,
			type: "GET",
			dataType: "json",
			success: function (response) {
				if (response.status == "sukses") {
					$("#pg").html(response.html);
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
});
