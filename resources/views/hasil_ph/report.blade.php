@extends('voyager::master')

@section('page_title', 'View Documents')

@section('content')
    @include('partials.head')

    <div id="content" class="closingorig">
        @include('partials.profile')
        @include('partials.data')
        <div class="footer">
            @include('partials.pendapatan')
            @include('partials.hutang')
            @include('partials.footer')
        </div>
    </div>
    <div style="text-align: center;">
        <button id="toggleButton">Switch Mode</button>
        <button id="printButton">Print</button>
    </div>

    <script>
        const toggleButton = document.getElementById('toggleButton');
        const printButton = document.getElementById('printButton');
        const content = document.getElementById('content');

        toggleButton.addEventListener('click', () => {
            if (content.classList.contains('closing')) {
                content.classList.remove('closing');
                content.classList.add('closingorig');
            } else {
                content.classList.remove('closingorig');
                content.classList.add('closing');
            }
        });

        printButton.addEventListener('click', () => {
            // Hide animations by temporarily removing the closing class
            const currentClass = content.classList.contains('closing') ? 'closing' : 'closingorig';
            if (currentClass === 'closing') {
                content.classList.remove('closing');
                content.classList.add('closingorig');
            }

            // Create a new window
            const printWindow = window.open('', '_blank');

            // Add content to the new window
            printWindow.document.open();
            printWindow.document.write(`
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print</title>
                    <style>
                        @media print {
                            body {
                            transform: scale(0.9);
                            font-size:9px;
                            }
                            .closing, .closingorig {
                            }
                             .underline {
      text-decoration: underline;
  }
  .container {
      width: 55%;
      margin: auto;
  }
  .header, .content, .footer {
      border: 1px solid transparent;
      
  }
  .header table, .content table {
      width: 100%;
      border-collapse: collapse;
  }
  .header td, .content td {
      border: 1px solid transparent;
  }
  .footer table {
      width: 100%;
  }
  .footer td {
      padding: 5px;
  }
  .header-text {
      text-align: center;
  }
  .center-text {
      text-align: center;
  }
  .line {
      border-top: 1px solid #000;
      margin: 20px 0;
  }
                        }
                        /* Add other print styles if necessary */
                    </style>
                </head>
                <body>
                    ${content.outerHTML}
                </body>
                </html>
            `);
            printWindow.document.close();

            // Wait for the document to be fully loaded before printing
            printWindow.onload = function () {
                printWindow.focus(); // Necessary for IE
                printWindow.print();
                printWindow.close(); // Close the print window after printing
            };

            // Restore the original class
            if (currentClass === 'closing') {
                content.classList.remove('closingorig');
                content.classList.add('closing');
            }
        });
    </script>
@endsection
