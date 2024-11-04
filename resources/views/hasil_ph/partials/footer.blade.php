<footer class="header">
    <p style="text-align: right;" id="nama-lokasi"></p>
    <p style="text-align: right;" id="nama-pabrik"></p>
    <br><br><br>
    <table>
    <tr>
    <td>
        <div></div>
        <div>atr/2016</div>
    </td>
    <td>
        <div class="underline" style="text-align: center;" id="anggota-1-nama"></div><br><br>
        <div style="text-align: center;" id="anggota-1-jabatan"></div>
    </td>
    <td>
        <div class="underline" style="text-align: right;" id="anggota-2-nama"></div><br><br>
        <div style="text-align: right;" id="anggota-2-jabatan"></div>
    </td>
    </tr>
    </table>
    <br><br>
</footer>

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
                var anggotas = response.anggotas || [];

                $('#header3').text(halamanRelated.header3 || '');

                var createdAt = new Date(dataMasuk.created_at);
            var formattedDate = createdAt.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });

            $('#nama-lokasi').text(`${halamanRelated.namaLokasi || ''}, ${formattedDate}`);
            $('#nama-pabrik').text(halamanRelated.namaPabrik || '');

                var anggota1 = anggotas.find(anggota => anggota.id === 1) || {};
                $('#anggota-1-nama').text(anggota1.nama );
                $('#anggota-1-jabatan').text(anggota1.jabatan );

                var anggota2 = anggotas.find(anggota => anggota.id === 2) || {};
                $('#anggota-2-nama').text(anggota2.nama || '');
                $('#anggota-2-jabatan').text(anggota2.jabatan || '');

            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>
