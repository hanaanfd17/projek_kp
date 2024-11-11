<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Documents</title>
</head>
<body>
    <!-- Bagian Head -->
    @include('hasil_ph.partials.head')

    <!-- Konten Utama -->
    <div id="content" class="closingorig">
        @include('hasil_ph.partials.profile')
        @include('hasil_ph.partials.data')

        <div class="footer">
            @include('hasil_ph.partials.pendapatan')
            @include('hasil_ph.partials.hutang')
            @include('hasil_ph.partials.footer')
        </div>
    </div>

    <!-- Tombol untuk Switch Mode dan Print -->
    <div style="text-align: center; margin-top: 20px;">
        <button id="toggleButton">Switch Mode</button>
        <button id="printButton">Print</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const toggleButton = document.getElementById('toggleButton');
        const printButton = document.getElementById('printButton');
        const content = document.getElementById('content');

        // Fungsi untuk switch mode
        toggleButton.addEventListener('click', () => {
            if (content.classList.contains('closing')) {
                content.classList.remove('closing');
                content.classList.add('closingorig');
            } else {
                content.classList.remove('closingorig');
                content.classList.add('closing');
            }
        });

        // Fungsi untuk mencetak konten
        printButton.addEventListener('click', () => {
            const currentClass = content.classList.contains('closing') ? 'closing' : 'closingorig';
            if (currentClass === 'closing') {
                content.classList.remove('closing');
                content.classList.add('closingorig');
            }

            // Membuka jendela baru untuk print
            const printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print</title>
                    <style>
                        @media print {
                            body { transform: scale(0.9); font-size: 9px; }
                            .closing, .closingorig { }
                            .underline { text-decoration: underline; }
                            .container { width: 55%; margin: auto; }
                            .header, .content, .footer { border: 1px solid transparent; }
                            .header table, .content table { width: 100%; border-collapse: collapse; }
                            .header td, .content td { border: 1px solid transparent; }
                            .footer table { width: 100%; }
                            .footer td { padding: 5px; }
                            .header-text { text-align: center; }
                            .center-text { text-align: center; }
                            .line { border-top: 1px solid #000; margin: 20px 0; }
                        }
                    </style>
                </head>
                <body>
                    ${content.outerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();

            printWindow.onload = function () {
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            };

            // Mengembalikan kelas asli setelah print
            if (currentClass === 'closing') {
                content.classList.remove('closingorig');
                content.classList.add('closing');
            }
        });
    </script>
</body>
</html>
