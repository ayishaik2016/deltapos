<?php

namespace App\Services;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class ReceiptPrinter
{
    public static function generate($order)
    {
        ob_start();

        $connector = new FilePrintConnector("php://output");
        $printer   = new Printer($connector);

        // ---- Header ----
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setEmphasis(true);
        $printer->text("Smart School Education\n");
        $printer->setEmphasis(false);
        $printer->text("POS Receipt\n");
        $printer->text("--------------------------\n");

        // ---- Items ----
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        foreach ($order['items'] as $item) {
            $line  = str_pad($item['name'], 12);
            $qty   = str_pad($item['qty'], 3, " ", STR_PAD_LEFT);
            $price = str_pad(number_format($item['price'], 2), 8, " ", STR_PAD_LEFT);
            $printer->text("$line $qty x $price\n");
        }

        $printer->text("--------------------------\n");

        // ---- Total ----
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->setEmphasis(true);
        $printer->text("TOTAL: " . number_format($order['total'], 2) . "\n");
        $printer->setEmphasis(false);

        // ---- Footer ----
        $printer->feed(2);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("Thank you!\n");
        $printer->feed(2);
        $printer->cut();

        $printer->close();

        return ob_get_clean(); // raw ESC/POS
    }
}
