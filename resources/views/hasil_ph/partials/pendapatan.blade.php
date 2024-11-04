<h3 class="underline" id="header2"></h3>
<table>
    <tbody id="table-body">
    </tbody>
</table>

<p id="total-pendapatan"></p>
<script>
    $(document).ready(function() {
        id = '{{ $id }}';
    $.ajax({
        url: 'http://localhost:8000/api/report-data/' + id,
            method: 'GET',
            success: function(response) {
                console.log('Respons JSON:', response);

                var body3s = response.body3s;
                var dataMasuk = response.dataMasuk;
                var konstanta = response.konstata;
                var halamanRelated = response.halamanRelated;

                // Fungsi untuk membatasi angka desimal
                function formatDecimal(value, decimals = 2) {
                    return parseFloat(value).toFixed(decimals);
                }

                $('#header2').text(halamanRelated.header2);

                var body3Row1 = body3s.find(item => item.id === 1);
                var body3Row2 = body3s.find(item => item.id === 2);

                $('#table-body').html(`
                    <tr>
                        <td>1. ${body3Row1.menu}</td>
                        <td>: ${formatDecimal(dataMasuk.gulaPetani * 0.9)} Ku * Rp ${formatDecimal(konstanta.nilaiGula)}</td>
                        <td>= Rp ${formatDecimal(dataMasuk.gulaPetani * 0.9 * konstanta.nilaiGula)}</td>
                    </tr>
                    <tr>
                        <td>2. ${body3Row2.menu}</td>
                        <td>: ${formatDecimal(dataMasuk.tetes)} Kq * Rp ${formatDecimal(konstanta.nilaiTetes)}</td>
                        <td>= Rp ${formatDecimal(dataMasuk.tetes * konstanta.nilaiTetes)}</td>
                    </tr>
                `);

                var totalPendapatan = (dataMasuk.tetes * konstanta.nilaiTetes) + (dataMasuk.gulaPetani * 0.9 * konstanta.nilaiGula);
                $('#total-pendapatan').text(`Jumlah Pendapatan Petani = Rp ${formatDecimal(totalPendapatan)}`);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>
