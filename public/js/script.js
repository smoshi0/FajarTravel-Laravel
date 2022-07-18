function cekTotalPembayaran() {
    var a = document.getElementById("harga").value;
    var b = document.getElementById("total_hari").value;
    if (a == "" || a == null) {
        alert("Mohon Isi Formulir Mobil Dengan Benar");
        return false;
    }
    if (b == "" || b == null || b <= 0) {
        alert("Mohon Isi Formulir Tanggal Penyewaan Dengan Benar");
        return false;
    }
    var jumlah = a * b;
    document.getElementById("total_pembayaran").value = jumlah;
    alert(jumlah);
}

function myFunction() {
    var x = document.getElementById("car_id");
    var y = document.getElementById("sewa");
    y.options[y.selectedIndex].value = x.options[x.selectedIndex].value;
    document.getElementById("harga").value = y.options[x.selectedIndex].text;
}

function GetDays() {
    var dropdt = new Date(document.getElementById("tgl_akhir").value);
    var pickdt = new Date(document.getElementById("tgl_awal").value);
    return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
}

function cal() {
    if (document.getElementById("tgl_akhir")) {
        document.getElementById("total_hari").value = GetDays();
    }
}
