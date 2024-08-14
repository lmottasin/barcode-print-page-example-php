<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Barcodes</title>
    <style>
        @page {
            size: 38mm 25mm; /* Set the page size to 38mm width by 25mm height */
            margin: 0; /* Remove any default margins */
        }

        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            -webkit-print-color-adjust: exact; /* Ensure color accuracy in printing */
            print-color-adjust: exact;
            background-color: white; /* Ensure a consistent white background */
        }

        .barcode-section {
            border: solid 1px black;
            color: black;
            width: 38mm;
            height: 25mm;
            padding: 5px;
            text-align: center;
            margin: 0 auto 3px auto; /* Center align the barcode section */
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            page-break-inside: avoid; /* Avoid breaking the barcode section across pages */
            break-inside: avoid; /* Compatibility with different browsers */
        }
    </style>
</head>
<body>
<div class="">
    <div class="">
        <!-- Loop to generate barcodes for each employee -->
        <?php
        require 'vendor/autoload.php';

        use \Milon\Barcode\DNS1D;

        $employees = [
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            ['phone' => '01780976220', 'name' => 'Mottasin Lemon', 'email' => 'lmottasin@gmail.com'],
            // Add more employees as needed
        ];

        foreach ($employees as $employee) {
            $phone = $employee['phone'];
            $name = substr($employee['name'], 0, 21); // Limit name to 21 characters
            $email = $employee['email'];

            $d = new DNS1D();
            $d->setStorPath(__DIR__.'/cache/'); // Adjust the cache path as needed
            ?>
            <div class="barcode-section">
                <?php echo $d->getBarcodeHTML($phone, 'C128', 1, 35); ?>
                <span style="font-size: 12px"><?php echo $name; ?></span>
                <span style="font-size: 12px">Phone: <?php echo $phone; ?></span>
                <span style="font-size: 12px"><?php echo $email; ?></span>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<script>
    // Uncomment the following lines to automatically trigger printing when the page loads
    // document.addEventListener("DOMContentLoaded", function (event) {
    //     window.print();
    // });
</script>
</body>
</html>
