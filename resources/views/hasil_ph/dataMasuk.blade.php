<!DOCTYPE html>
<html lang="en">
@include('hasil_ph.cssheads.headData')

<body>
    <div class="glitch">
        <table id="data-masuk-table" style="margin-right:10%; margin-left:5%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ku Tebu</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mendapatkan data dari API
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
                                <td class="hero glitch layers" data-text="show??">
                                    <a href="javascript:void(0);" 
                                       class="view-document a" 
                                       data-encrypted-id="${data.encrypted_id}" 
                                       data-text="sure?">show</a>
                                </td>
                            </tr>
                        `;
                    });
                    $('#data-masuk-table tbody').html(rows);

                    // Menambahkan event listener pada tombol "show"
                    $('.view-document').on('click', function() {
                        var encryptedId = $(this).data('encrypted-id');
                        // Membuat form secara dinamis untuk mengirim request
                        var form = document.createElement('form');
                        form.method = 'GET';
                        form.action = '/data-report';

                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'Id';
                        input.value = encryptedId;
                        
                        form.appendChild(input);
                        document.body.appendChild(form);
                        form.submit();
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', error);
                }
            });
        });
    </script>
</body>
</html>
