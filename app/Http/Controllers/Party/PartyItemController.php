<?php

namespace App\Http\Controllers\Party;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use App\Traits\FormatNumber;
use App\Traits\FormatsDateInputs;
use App\Enums\General;
use App\Models\Sale\Sale;
use App\Models\Sale\SaleReturn;
use App\Models\Purchase\Purchase;
use App\Models\Purchase\PurchaseReturn;
use App\Models\Party\Party;
use App\Models\Items\Item;
use App\Models\Party\CustomerItem;
use App\Models\Items\ItemTransaction;
use App\Models\PaymentTransaction;
use App\Models\Party\PartyTransaction;
use App\Models\Party\PartyPaymentAllocation;
use App\Models\Party\PartyPayment;
use App\Models\PartyBalanceAfterAdjustment;
use App\Models\Sale\Quotation;
use App\Services\PartyService;
use App\Services\PaymentTransactionService;
use Mpdf\Mpdf;

class PartyItemController extends Controller
{
    use FormatsDateInputs;

    use FormatNumber;

    private $partyService;

    public function __construct(PartyService $partyService, PaymentTransactionService $paymentTransactionService)
    {
        $this->partyService = $partyService;
        $this->paymentTransactionService = $paymentTransactionService;
    }
    public function list($partyType, $id) : View {
        $party = Party::findOrFail($id);

        $partyData = [
            'party_type' => ($party->party_type == 'customer') ? __('customer.customers') : __('supplier.suppliers')
        ];

        return view('party.items.list', compact('party', 'partyData'));
    }

    public function datatableList(Request $request)
    {
        $data = Item::with([ 'user', 'brand', 'category', 'customerItems'])
            ->when($request->item_category_id, function ($query) use ($request) {
                return $query->where('item_category_id', $request->item_category_id);
            })
            ->when($request->brand_id, function ($query) use ($request) {
                return $query->where('brand_id', $request->brand_id);
            })
            ->when($request->created_by, function ($query) use ($request) {
                return $query->where('created_by', $request->created_by);
            });

        return DataTables::of($data)
                    ->filter(function ($query) use ($request) {
                        if ($request->has('search')) {
                            $searchTerm = $request->search['value'];
                            $query->where(function ($q) use ($searchTerm) {
                                $q->where('name', 'like', "%{$searchTerm}%")
                                  ->orWhere('description', 'like', "%{$searchTerm}%")
                                  ->orWhere('sku', 'like', "%{$searchTerm}%")
                                  ->orWhere('sale_price', 'like', "%{$searchTerm}%")
                                  ->orWhere('item_code', 'like', "%{$searchTerm}%")
                                  ->orWhere('item_location', 'like', "%{$searchTerm}%")
                                  // Add more columns as needed
                                  ->orWhereHas('brand', function ($brandQuery) use ($searchTerm) {
                                        $brandQuery->where('name', 'like', "%{$searchTerm}%");
                                    })
                                    ->orWhereHas('category', function ($categoryQuery) use ($searchTerm) {
                                        $categoryQuery->where('name', 'like', "%{$searchTerm}%");
                                    });
                            });
                        }
                    })
                    ->addIndexColumn()
                    ->addColumn('created_at', function ($row) {
                        return $row->created_at->format(app('company')['date_format']);
                    })
                    ->addColumn('username', function ($row) {
                        return $row->user->username??'';
                    })
                    ->editColumn('sale_price', function ($row) {
                        return $this->formatWithPrecision($row->sale_price);
                    })
                    ->addColumn('brand_name', function ($row) {
                        return $row->brand->name??'';
                    })
                    ->addColumn('item_location', function ($row) {
                        return $row->item_location??'';
                    })
                    ->addColumn('category_name', function ($row) {
                        return $row->category->name;
                    })
                    ->editColumn('purchase_price', function ($row) {
                        return $this->formatWithPrecision($row->purchase_price);
                    })
                    ->editColumn('customer_item_price', function ($row) use ($request) {
                        $customerItemPrice = $row->sale_price;
                        if ($request->has('party_id')) {
                            $customerItemDetail = $row->customerItemFor($request->party_id)->first();
                            if ($customerItemDetail) {
                                $customerItemPrice = $customerItemDetail->customer_item_price;
                            }
                        }

                        return $this->formatWithPrecision($customerItemPrice);
                    })
                    ->make(true);
    }

    public function updateItemPrice(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validation rules

            $rules = [
                'item_id'  => 'required|integer',
                'party_id'  => 'required|integer',
                'item_customer_price' => 'required|numeric|gt:0',
            ];

            //validation message
            $messages = [
                'item_id.required' => 'Item is required.',
                'party_id.required' => 'Customer is required.',
                'item_customer_price.required' => 'Item price is required.',
                'item_customer_price.gt' => 'Item price must be greater than zero.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            $partyId = $request->input('party_id');
            $itemId = $request->input('item_id');
            $itemPrice = $request->input('item_customer_price');

            $item = Item::find($itemId);

            $customerItem = CustomerItem::firstOrNew([
                'item_id' => $itemId,
                'party_id' => $partyId,
            ]);

            $customerItem->item_code = $item->item_code;
            $customerItem->name = $item->name;
            $customerItem->sale_price = $item->sale_price;
            $customerItem->purchase_price = $item->purchase_price;
            $customerItem->customer_item_price = $itemPrice;
            $customerItem->status = 1;
            $customerItem->save();

            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => __('app.record_saved_successfully'),
                'id'        => $customerItem->id,
            ]);


        } catch (\Exception $e) {
                DB::rollback();

                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                ], 409);

        }

    }
}
