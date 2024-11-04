<div class="header">
    <table>
        <td id="body1s-data">
        </td>
        <td id="body1s-data-right">
        </td>
    </table>
</div>
<div class="content">
    <h3 class="underline" id="header1"></h3>
    <table id="body2s-data">
    </table>
</div>
<script>
    $(document).ready(function() {
        id = '{{ $id }}';
        $.ajax({
            url: 'http://localhost:8000/api/report-data/' + id,
            method: 'GET',
            success: function(response) {
                var body1s = response.body1s;
                var petani = response.petani;
                var body2s = response.body2s;
                var dataMasuk = response.dataMasuk;
                var halamanRelated = response.halamanRelated;

                function formatNumber(num) {
                    return parseFloat(num).toFixed(2);
                }

                $('#body1s-data').html(`
                    <div>${body1s.find(item => item.id == 1).menu}: ${petani.kelompok}</div>
                    <div>${body1s.find(item => item.id == 3).menu}: ${petani.kebun}</div>
                    <div>${body1s.find(item => item.id == 2).menu}: ${petani.noPH}</div>
                    <div>${body1s.find(item => item.id == 7).menu}: ${petani.nofak}</div>
                    <div>${body1s.find(item => item.id == 10).menu}: ${petani.periode}</div>
                `);

                $('#body1s-data-right').html(`
                    <div>${body1s.find(item => item.id == 4).menu}: ${petani.kecamatan}</div>
                    <div>${body1s.find(item => item.id == 5).menu}: ${petani.nik}</div>
                    <div>${body1s.find(item => item.id == 6).menu}: ${petani.kabupaten}</div>
                    <div>${body1s.find(item => item.id == 9).menu}: ${petani.kategori}</div>
                    <div>${body1s.find(item => item.id == 8).menu}: ${petani.luas}</div>
                `);
                $('#header1').text(halamanRelated.header1);
                $('#body2s-data').html(`
                    <tr>
                        <td>${body2s.find(item => item.id == 1).menu}: ${formatNumber(dataMasuk.kuTebu)} Ku</td>
                        <td>${body2s.find(item => item.id == 7).menu}: ${formatNumber(dataMasuk.gulaPetani * 0.9)} Ku</td>
                    </tr>
                    <tr>
                        <td>${body2s.find(item => item.id == 2).menu}: ${formatNumber(dataMasuk.rendemen)} % Gula</td>
                        <td>${body2s.find(item => item.id == 8).menu}: ${formatNumber(dataMasuk.gulaPetani * 0.1)} Ku</td>
                    </tr>
                    <tr>
                        <td>${body2s.find(item => item.id == 3).menu}: ${formatNumber(dataMasuk.rendemenPetani)} % Gula</td>
                        <td>${body2s.find(item => item.id == 9).menu}: ${formatNumber(dataMasuk.tetes)} Kg</td>
                    </tr>
                    <tr>
                        <td colspan="2">${body2s.find(item => item.id == 4).menu}: ${formatNumber(dataMasuk.gulaPetani)} Ku <br>
                            *)${body2s.find(item => item.id == 5).menu}: <br>
                            *)${body2s.find(item => item.id == 6).menu}:
                        </td>
                    </tr>
                `);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>
