<?php

namespace App\Http\Controllers\Reports;

use App\Traits\FormatNumber;
use App\Traits\FormatsDateInputs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Items\Item;
use App\Models\Items\ItemTransaction;
use App\Models\Items\ItemBatchTransaction;
use App\Models\Items\ItemSerialTransaction;
use App\Models\Items\ItemBatchQuantity;
use App\Models\Items\ItemSerialQuantity;
use App\Models\Items\ItemGeneralQuantity;
use App\Enums\ItemTransactionUniqueCode;
use App\Models\Sale\Sale;
use App\Models\User;
use App\Services\StockImpact;
use App\Services\ItemTransactionService;

class HsnReportController extends Controller
{
    use FormatsDateInputs;

    use FormatNumber;

    private $stockImpact;

    private $itemTransactionService;

    function __construct(StockImpact $stockImpact, ItemTransactionService $itemTransactionService)
    {
        $this->stockImpact = $stockImpact;
        $this->itemTransactionService = $itemTransactionService;
    }
    /**
     * Get HSN Summary Records
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getHsnSummaryRecords(Request $request): JsonResponse
    {
        try {

            $warehouseId         = $request->input('warehouse_id');

            //If warehouseId is not provided, fetch warehouses accessible to the user
            $warehouseIds = $warehouseId ? [$warehouseId] : User::find(auth()->id())->getAccessibleWarehouses()->pluck('id');
            $saleTransactions = ItemTransaction::whereIn('warehouse_id', $warehouseIds)
                ->whereHasMorph('transaction', [Sale::class])
                ->with(['item'])
                ->get()
                ->groupBy(function ($transaction) {
                    return $transaction->item->hsn ?? '';
                });

            $recordsArray = [];

            foreach ($saleTransactions as $hsn => $transactions) {
                $itemNames = $transactions->pluck('item.name')->unique()->toArray();
                $quantity = $transactions->sum('quantity');
                $taxRate = $transactions->first()->item->tax->rate ?? '';
                $unitName = $transactions->first()->item->baseUnit->name ?? '';
                $stockValueCost = 0; // Assuming stock value cost is not calculated here
                $taxableAmount = $transactions->sum('unit_price') * $quantity; // Assuming taxable amount is calculated based on unit price and quantity
                $taxAmount = $taxableAmount * ($taxRate / 100); // Assuming tax amount is calculated based on taxable amount and tax rate
                $igstAmount = $taxAmount / 2; // Assuming IGST, CGST, and SGST are equally divided
                $cgstAmount = $taxAmount / 2;
                $sgstAmount = $taxAmount;

                $recordsArray[] = [
                    'hsn'               => $hsn,
                    'description'       => '',//implode(', ', $itemNames),
                    'unit_name'         => $unitName,
                    'quantity'          => $this->formatWithPrecision($quantity, comma:false),
                    'tax_rate'          => $taxRate,
                    'stock_value_cost'  => $this->formatWithPrecision($stockValueCost, comma:false),
                    'taxable_amount'    => $this->formatWithPrecision($taxableAmount, comma:false),
                    'igst_amount'       => $this->formatWithPrecision(0, comma:false),
                    'cgst_amount'       => $this->formatWithPrecision(0, comma:false),
                    'sgst_amount'       => $this->formatWithPrecision(0, comma:false),
                ];
            }
            // $preparedData = ItemGeneralQuantity::with([
            //                                         'item.baseUnit',
            //                                         'item.tax',
            //                                         'warehouse'
            //                                     ])
            //                                     ->whereIn('warehouse_id', $warehouseIds)
            //                                     ->get();

            // $recordsArray = [];

            // foreach ($preparedData as $data) {
            //     $recordsArray[] = [
            //                         'hsn'               => $data->item->hsn ?? '',
            //                         'description'       => '',
            //                         'unit_name'         => $data->item->baseUnit->name ?? '',
            //                         'quantity'          => $this->formatWithPrecision($data->quantity, comma:false),
            //                         'tax_rate'          => $data->item->tax->rate ?? '',
            //                         'stock_value_cost'  => $this->formatWithPrecision(0, comma:false),
            //                         'taxable_amount'    => $this->formatWithPrecision(0, comma:false),
            //                         'igst_amount'       => $this->formatWithPrecision(0, comma:false),
            //                         'cgst_amount'       => $this->formatWithPrecision(0, comma:false),
            //                         'sgst_amount'       => $this->formatWithPrecision(0, comma:false),
            //                     ];
            // }


            return response()->json([
                        'status'    => true,
                        'message' => "Records are retrieved!!",
                        'data' => $recordsArray,
                    ]);
        } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                ], 409);

        }
    }

}
