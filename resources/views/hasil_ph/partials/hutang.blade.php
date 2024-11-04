<h3 class="underline" id="header3"></h3>
<table id="table-hutang">
</table>
<div class="line"></div>
<p style="text-align: right;" id="jumlah-hutang"></p>
<p>titipan uang gula petani RP: 0</p>
<p style="text-align: right;" id="jumlah-pendapatan"></p>
<p id="sisa-pinjaman">Sisa Pinjaman Di PG : Rp 0</p>
<div class="line"></div>
<script>
    $(document).ready(function() {
        id = '{{ $id }}';
        $.ajax({
            url: 'http://localhost:8000/api/report-data/' + id,
            method: 'GET',
            success: function(response) {
                console.log('Respons JSON:', response);

                var body4s = response.body4s || [];
                var dataMasuk = response.dataMasuk || {};
                var konstata = response.konstata || {};
                var halamanRelated = response.halamanRelated || {};

                $('#header3').text(halamanRelated.header3 || '');

                var totalHutang = 0;

                function safeMultiply(a, b) {
                    return (parseFloat(a) || 0) * (parseFloat(b) || 0);
                }

                function 
                formatCurrency(num) {
                    return `Rp ${parseFloat(num).toFixed(2)}`;
                }

                var rows = `
                    <tr>
                        <td>1. ${body4s.find(item => item.id === 1)?.menu || ''}</td>
                        <td>: ${formatCurrency(konstata.biayaUpah)} Ku tebu masuk </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>2. ${body4s.find(item => item.id === 2)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.kuTebu)} Ku * ${formatCurrency(konstata.angkutTruk)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.kuTebu, konstata.angkutTruk))}</td>
                    </tr>
                    <tr>
                        <td>3. ${body4s.find(item => item.id === 3)?.menu || ''}</td>
                        <td>: ${formatCurrency(0)} Ku * ${formatCurrency(0)} </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>4. ${body4s.find(item => item.id === 4)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.tetes)} Kg * ${formatCurrency(konstata.biayaEksplo)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.tetes, konstata.biayaEksplo))}</td>
                    </tr>
                    <tr>
                        <td>5. ${body4s.find(item => item.id === 5)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.luas * 0.1)} Ha * ${formatCurrency(konstata.biayaRDKK)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.luas * 0.1, konstata.biayaRDKK))}</td>
                    </tr>
                    <tr>
                        <td>6. ${body4s.find(item => item.id === 6)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.kuTebu)} Ku * ${formatCurrency(konstata.biayaLinting)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.kuTebu, konstata.biayaLinting))}</td>
                    </tr>
                    <tr>
                        <td>7. ${body4s.find(item => item.id === 7)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.gulaPetani * 0.9)} Ku * ${formatCurrency(konstata.biaaZAK)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.gulaPetani * 0.9, konstata.biaaZAK))}</td>
                    </tr>
                    <tr>
                        <td>8. ${body4s.find(item => item.id === 8)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.gulaPetani * 0.1)} Ku * ${formatCurrency(konstata.biaaZAK)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.gulaPetani * 0.1, konstata.biaaZAK))}</td>
                    </tr>
                    <tr>
                        <td>9. ${body4s.find(item => item.id === 9)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.kuTebu)} Ku * ${formatCurrency(konstata.iuranAPTRI)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.kuTebu, konstata.iuranAPTRI))}</td>
                    </tr>
                    <tr>
                        <td>10. ${body4s.find(item => item.id === 10)?.menu || ''}</td>
                        <td>: ----------------> </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>11. ${body4s.find(item => item.id === 11)?.menu || ''}</td>
                        <td>: ----------------> </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>12. ${body4s.find(item => item.id === 12)?.menu || ''}</td>
                        <td>: ----------------> </td>
                        <td>= ${formatCurrency(293)}</td>
                    </tr>
                    <tr>
                        <td>13. ${body4s.find(item => item.id === 13)?.menu || ''}</td>
                        <td>: kont: </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>14. ${body4s.find(item => item.id === 14)?.menu || ''}</td>
                        <td>: kont: </td>
                        <td>= ${formatCurrency(0)}</td>
                    </tr>
                    <tr>
                        <td>15. ${body4s.find(item => item.id === 15)?.menu || ''}</td>
                        <td>: ${formatCurrency(dataMasuk.kuTebu)} Ku * ${formatCurrency(konstata.biayaCrane)} </td>
                        <td>= ${formatCurrency(safeMultiply(dataMasuk.kuTebu, konstata.biayaCrane))}</td>
                    </tr>
                `;

                $('#table-hutang').html(rows);

                totalHutang = [
                    safeMultiply(dataMasuk.kuTebu, konstata.angkutTruk),
                    safeMultiply(dataMasuk.tetes, konstata.biayaEksplo),
                    safeMultiply(dataMasuk.luas * 0.1, konstata.biayaRDKK),
                    safeMultiply(dataMasuk.kuTebu, konstata.biayaLinting),
                    safeMultiply(dataMasuk.gulaPetani * 0.9, konstata.biaaZAK),
                    safeMultiply(dataMasuk.gulaPetani * 0.1, konstata.biaaZAK),
                    safeMultiply(dataMasuk.kuTebu, konstata.iuranAPTRI),
                    safeMultiply(dataMasuk.kuTebu, konstata.biayaCrane)
                ].reduce((a, b) => a + b, 0);

                $('#jumlah-hutang').text(`Jumlah Hutang Petani Pada PG = ${formatCurrency(totalHutang)}`);

                var nilaiTetes = parseFloat(konstata.nilaiTetes) || 0;
                var nilaiGula = parseFloat(konstata.nilaiGula) || 0;
                var sisaPinjaman = parseFloat(response.sisaPinjaman) || 0; 

                var totalPendapatan = (dataMasuk.tetes * nilaiTetes) + (dataMasuk.gulaPetani * 0.9 * nilaiGula) - (totalHutang) - sisaPinjaman;
                $('#jumlah-pendapatan').text(`Jumlah Pendapatan Petani (A-B) = ${formatCurrency(totalPendapatan)}`);
                $('#sisa-pinjaman').text(`Sisa Pinjaman Di PG : ${formatCurrency(sisaPinjaman)}`);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>
