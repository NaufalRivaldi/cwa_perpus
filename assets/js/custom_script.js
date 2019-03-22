// sweet alert
const flashData = $('.flash-data').data('flashdata');

if (flashData == 'login-gagal') {
	swal({
		title: "Failed",
		text: "Login gagal, username dan password tidak valid.",
		icon: "error",
		button: "OK",
	});
} else if (flashData == 'daftar') {
	swal({
		title: "Success",
		text: "Daftar berhasil, silahkan login.",
		icon: "success",
		button: "OK",
	});
} else if (flashData == 'daftar-gagal') {
	swal({
		title: "Failed",
		text: "Daftar gagal, pastikan isi data dengan benar.",
		icon: "error",
		button: "OK",
	});
}
