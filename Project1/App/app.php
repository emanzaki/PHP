<?php
function getTransactionsFiles(string $dirpath)
{
    foreach (scandir($dirpath) as $file) {
        if (is_dir($file))
            continue;
        $files[] = $dirpath . $file;
    }
    return $files;
}

function getTransaction(string $filePath)
{
    if (!file_exists($filePath)) {
        echo "file doesn't exist";
        return;
    } else {
        $file = fopen($filePath, 'r');
        $transactions = [];
        while (($transaction = fgetcsv($file)) != false) {
            if ($transaction != null) {
                $transactions[] = $transaction;
            }
        }

    }
    return $transactions;
}

function CalculateTotal($transacions)
{
    $total = ['Income' => 0, 'Expense' => 0, 'Net' => 0];

    foreach ($transacions as $transacion) {
        $amount = str_replace(['$', ','], '', $transacion[3]);
        if ($amount > 0) {
            $total['Income'] += $amount;
        } else {
            $total['Expense'] += $amount;
        }
        $total['Net'] += $amount;
    }
    return $total;
}

?>