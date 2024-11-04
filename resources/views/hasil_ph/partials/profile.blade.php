<div class="header-text">
    <h2></h2>
    <h3></h3>
</div>
<br>
<script>
$(document).ready(function() {
    id = '{{ $id }}';
    $.ajax({
        url: 'http://localhost:8000/api/report-data/' + id,
        method: 'GET',
        success: function(response) {
            $('.header-text h2').text(response.halamanRelated.namaPabrik);
            $('.header-text h3').text(response.halamanRelated.judulLaman);
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
    });
});
</script>
