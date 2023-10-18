document.getElementById("semester").addEventListener("change", function () {
  const selectedSemester = this.value;

  // Objek untuk memetakan nilai semester ke IPK
  const ipkBySemester = {
    1: "3.9",
    2: "3.9",
    3: "3.8",
    4: "3.7",
    5: "3.6",
    6: "3.5",
    7: "3.4",
    8: "3.4",
    // Tambahkan semester lainnya jika diperlukan
  };

  // Mengambil nilai IPK berdasarkan semester yang dipilih
  const ipk = ipkBySemester[selectedSemester] || ""; // Menggunakan nilai default jika tidak ada yang cocok

  // Mengisi nilai IPK ke input
  document.getElementById("ipk").value = ipk;
});
