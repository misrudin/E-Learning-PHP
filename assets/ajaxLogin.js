$(document).ready(function () {
	$("#loginForm").on("submit", function (e) {
		e.preventDefault();
		const sbg = $(this).data("sbg");
		login(sbg);
	});

	function login(sbg) {
		const pesan = $("#pesan_error");
		const username = $("#username");
		const password = $("#password");

		if (username.val() === "" && password.val() === "") {
			username.addClass("is-invalid");
			password.addClass("is-invalid");
		} else if (username.val() === "") {
			username.addClass("is-invalid");
			password.removeClass("is-invalid");
		} else if (password.val() === "") {
			password.addClass("is-invalid");
			username.removeClass("is-invalid");
		} else {
			username.removeClass("is-invalid");
			password.removeClass("is-invalid");

			$.ajax({
				url: "auth/masuk?sbg=" + sbg,
				type: "POST",
				data: $("#loginForm").serialize(),
				dataType: "json",
				beforeSend: function (e) {
					if (e && e.overrideMimeType) {
						e.overrideMimeType("application/jsoncharset=UTF-8");
					}
				},
				success: function (data) {
					if (data.status === "sukses") {
						window.location.href = "dashboard";
					} else {
						pesan.html(data.pesan);
					}
				},
			});
		}
	}
});
