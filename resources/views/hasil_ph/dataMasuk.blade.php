<!DOCTYPE html>
<html lang="en">
@include('hasil_ph.cssheads.headData')

<body>
    <div class="glitch">
        <table id="data-masuk-table" style="margin-right:10%; margin-left:5%;">
            
            <tbody>
                
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://localhost:8000/api/data-masuk',
            method: 'GET',
            success: function(response) {
                var rows = '';
                response.dataMasuk.forEach(function(data) {
                   rows += `
                        <tr>
                            <td class="hero glitch layers" data-text="${data.id}">${data.id}</td>
                            <td class="hero glitch layers" data-text="${data.kuTebu}">${data.kuTebu}</td>
                            <td class="hero glitch layers" data-text="show??"><a class="a" href="/dataReport/${data.encrypted_id}" data-text="sure?">show</a></td>
                        </tr>
                    `;
                });
                $('#data-masuk-table tbody').html(rows);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    });
</script>

